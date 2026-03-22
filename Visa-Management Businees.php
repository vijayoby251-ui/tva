<?php include 'header.php' ?>
<style>
   * {
   margin: 0;
   padding: 0;
   box-sizing: border-box;
   }
   body {
   font-family: 'Segoe UI', sans-serif;
   color: #333;
   background-color: #fff;
   line-height: 1.6;
   }
   :root {
   --primary-blue: #004aad;
   --primary-orange: #f57c00;
   }
   /* Hero Section */
   .hero {
   background: url('banner.jpg') center/cover no-repeat;
   color: #fff;
   padding: 100px 20px;
   text-align: center;
   background-color: rgba(0, 0, 0, 0.5);
   }
   .hero-content {
   background: rgba(0, 0, 0, 0.4);
   padding: 40px;
   display: inline-block;
   border-radius: 10px;
   }
   .hero h1 {
   font-size: 2.8rem;
   margin-bottom: 20px;
   }
   .hero p {
   font-size: 1.2rem;
   margin-bottom: 30px;
   }
   .cta-buttons .btn {
   padding: 12px 24px;
   margin: 0 10px;
   border-radius: 5px;
   text-decoration: none;
   font-weight: bold;
   }
   .btn.orange {
   background-color: var(--primary-orange);
   color: #fff;
   }
   .btn.blue {
   background-color: var(--primary-blue);
   color: #fff;
   }
   /* Program Overview */
   .program-overview {
   padding: 60px 20px;
   text-align: center;
   background-color: #f9f9f9;
   }
   .program-overview h2 {
   font-size: 2rem;
   color: var(--primary-blue);
   margin-bottom: 20px;
   }
   .program-overview p {
   max-width: 800px;
   margin: auto;
   font-size: 1.1rem;
   }
   /* Learn Section */
   .learn-section {
   padding: 60px 20px;
   background-color: #fff;
   text-align: center;
   }
   .learn-section h2 {
   font-size: 2rem;
   color: var(--primary-orange);
   margin-bottom: 40px;
   }
   .cards {
   display: flex;
   flex-wrap: wrap;
   justify-content: center;
   gap: 20px;
   }
   .card {
   background-color: #f1f5f9;
   padding: 20px;
   width: 250px;
   border-radius: 8px;
   font-weight: 500;
   color: #002768;
   box-shadow: 0 2px 6px rgba(0,0,0,0.1);
   }
   /* CTA Final */
   .cta-final {
   background-color: var(--primary-blue);
   color: #fff;
   text-align: center;
   padding: 60px 20px;
   }
   .cta-final h2 {
   font-size: 2rem;
   margin-bottom: 20px;
   }
</style>
<!-- Page Header Start -->
<div class="page-header">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-12">
            <div class="page-header-box">
               <h1 class="text-anime-style-3" data-cursor="-opaque">Business Setup Program</h1>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="page-bussines">
<div class="container">
<div class="row">
<div class="col-lg-12">
   <div class="service-single-content">
      <div class="service-feature-image">
         <figure class="image-anime reveal">
            <img src="images/Business set.png" alt="">
         </figure>
      </div>
      <div class="why-choose-content service-single-why-choose">
         <div class="container text-center my-5">
            <h2 class="heading-title">This Program is Designed For?</h2>
            <br></n>
            <p class="description-text">
               The Business Setup Program is tailored for aspiring entrepreneurs and professionals who want to establish their own visa consultancy or immigration services business. It is ideal for experienced visa consultants ready to transition into business ownership, travel agency owners looking to expand their services, and individuals with industry knowledge who seek structured guidance to build a legally compliant and profitable immigration business. This program also suits freelancers aiming to formalize their services, as well as professionals from legal, education, or international recruitment backgrounds who wish to enter the visa and immigration industry with a strong foundation and ongoing support.
               <!-- What You’ll Learn -->
         </div>
      </div>
   </div>
</div>
<section class="learn-section">
   <h2>What You’ll Learn</h2>
   <div class="cards">
      <div class="card">Business Registration & Legal Setup</div>
      <div class="card">Visa Services Design & Delivery</div>
      <div class="card">Operations & Infrastructure</div>
      <div class="card">Digital Marketing & Lead Generation</div>
      <div class="card">Client Communication & Trust Building</div>
      <div class="card">Compliance & Best Practices</div>
   </div>
</section>
<!-- Page Service Single End -->
<?php include 'footer.php' ?>