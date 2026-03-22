<?php
$file = $_GET['file'] ?? '';
$name = $_GET['name'] ?? '';
$email = $_GET['email'] ?? '';

// Prevent reuse of already submitted file
if (!file_exists($file) || file_exists($file . '.used')) {
  die("<h2 style='font-family: Arial; color: red;'>❌ This link has expired or already been used.</h2>");
}
?>
$file = $_GET['file'] ?? '';
$name = $_GET['name'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign Agreement</title>
  <style>
    body { font-family: Arial; background: #f0e0d0; padding: 20px; }
    .container { background: #fff; padding: 20px; border-radius: 10px; max-width: 800px; margin: auto; }
    canvas { border: 1px solid #000; width: 100%; height: 150px; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Sign the Agreement</h2>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
    <embed src="<?php echo htmlspecialchars($file); ?>" width="100%" height="400px" />
    <br><br>
    <label>Sign Below:</label>
    <canvas id="signature"></canvas>
    <br>
    <button onclick="clearSignature()">Clear</button>
    <button onclick="downloadSignedPDF()">Submit Signature</button>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.5/dist/signature_pad.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
  <script>
    const canvas = document.getElementById("signature");
    const signaturePad = new SignaturePad(canvas);

    function clearSignature() {
      signaturePad.clear();
    }

    async function downloadSignedPDF() {
      if (signaturePad.isEmpty()) {
        alert("Please provide your signature.");
        return;
      }

      const existingPdfBytes = await fetch("<?php echo htmlspecialchars($file); ?>").then(res => res.arrayBuffer());
      const pdfDoc = await PDFLib.PDFDocument.load(existingPdfBytes);
      const pages = pdfDoc.getPages();
      const lastPage = pages[pages.length - 1];

      const pngUrl = signaturePad.toDataURL();
      const pngImageBytes = await fetch(pngUrl).then(res => res.arrayBuffer());
      const pngImage = await pdfDoc.embedPng(pngImageBytes);
      const pngDims = pngImage.scale(0.5);

      lastPage.drawText("Signed by: <?php echo addslashes($name); ?>", {
        x: 50,
        y: 80,
        size: 12,
        color: PDFLib.rgb(0, 0, 0),
      });

      lastPage.drawText(`Date: ${new Date().toLocaleDateString()}`, {
        x: 50,
        y: 65,
        size: 12,
        color: PDFLib.rgb(0, 0, 0),
      });

      lastPage.drawImage(pngImage, {
        x: 50,
        y: 100,
        width: pngDims.width,
        height: pngDims.height,
      });

      const pdfBytes = await pdfDoc.save();

      // Upload to server
      fetch("upload_signed.php?name=<?php echo urlencode($name); ?>", {
        method: "POST",
        body: pdfBytes,
        headers: { "Content-Type": "application/pdf" }
      })
      .then(res => res.text())
      .then(msg => {
        alert("✅ Thank you! Your agreement has been submitted.");
        document.body.innerHTML = "<h2 style='text-align:center; font-family:Arial;'>✅ Thank you!<br>Your agreement has been successfully submitted.</h2>";
      })
      .catch(err => {
        alert("Upload failed: " + err);
      });
    }
  </script>
</body>
</html>
