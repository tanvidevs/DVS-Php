<?php
include './db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect form data and sanitize input
  $name = htmlspecialchars($_POST['name']);
  $phone = htmlspecialchars($_POST['phone']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  // Validate form data (you can add more validation)
  if (!empty($name) && !empty($phone) && !empty($email) && !empty($message)) {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contact_form (name, phone, email, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
      echo '
       <script>
          alert("Thank you for your submission!");
          window.location.href = "thankyou.php"; // Redirect after successful submission
       </script>
      ';
    } else {
      echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
  } else {
    echo '<script>alert("All fields are required!");</script>';
  }
}

// Close connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact | Dvsmining</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="styles.css" />

    <!-- Animation CDNs -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body class="bg-gray-100">
    <!-- fit background image and make it Responsive -->
    <section class="text-center bg-cover bg-center bg-no-repeat relative">
      <!-- Image Background -->
      <img
        src="aboutbg.png"
        alt="Dvsmining Background"
        class="absolute inset-0 w-full h-full object-cover"
      />

      <!-- Overlay to ensure text is visible -->
      <div class="relative z-10 h-full flex flex-col justify-center">
        <!-- Navbar -->
        <nav
          class="bg-transparent p-4 mx-0 md:mx-36"
          data-aos="fade-down"
        >
          <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-bold text-xl">
              <img src="./logo.png" class="h-20" alt="Dvsmining Logo" />
            </div>
            <ul class="hidden md:flex space-x-6">
              <li>
                <a
                  href="#"
                  class="text-white hover:bg-orange-600 rounded-2xl py-2 px-3"
                  >Home</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-white hover:bg-orange-600 rounded-2xl py-2 px-3"
                  >About</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-white hover:bg-orange-600 rounded-2xl py-2 px-3"
                  >Our USP</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-white hover:bg-orange-600 rounded-2xl py-2 px-3"
                  >Services</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-white hover:bg-orange-600 rounded-2xl py-2 px-3"
                  >Contact</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="text-white bg-orange-600 hover:bg-orange-800 rounded-full py-3 px-4 font-bold"
                  >Enquire Now</a
                >
              </li>
            </ul>
            <div class="md:hidden">
              <button id="menu-toggle" class="text-white focus:outline-none">
                <svg
                  class="w-8 h-8"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16m-7 6h7"
                  ></path>
                </svg>
              </button>
            </div>
          </div>
        </nav>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden bg-transparent p-4 md:hidden">
          <ul class="space-y-4" data-aos="fade-down">
            <li>
              <a
                href="#"
                class="text-white font-bold hover:bg-orange-600 rounded-2xl py-2 text-center block"
                >Home</a
              >
            </li>
            <li>
              <a
                href="#"
                class="text-white font-bold hover:bg-orange-600 rounded-2xl py-2 text-center block"
                >About</a
              >
            </li>
            <li>
              <a
                href="#"
                class="text-white font-bold hover:bg-orange-600 rounded-2xl py-2 text-center block"
                >Our USP</a
              >
            </li>
            <li>
              <a
                href="#"
                class="text-white font-bold hover:bg-orange-600 rounded-2xl py-2 text-center block"
                >Services</a
              >
            </li>
            <li>
              <a
                href="#"
                class="text-white font-bold hover:bg-orange-600 rounded-2xl py-2 text-center block"
                >Contact</a
              >
            </li>
            <li>
              <a
                href="#"
                class="text-white bg-orange-600 hover:bg-orange-800 rounded-full py-3 px-4 font-bold"
                >Enquire Now</a
              >
            </li>
          </ul>
        </div>

        <!-- Hero Section -->
        <div class="p-2">
          <div class="text-center mt-10 md:mt-2 mb-10">
            <h1
              class="text-6xl md:text-7xl font-bold text-white"
              data-aos="fade-down"
            >
              Contact Us
            </h1>
            <p class="mt-4 text-white text-xl md:text-2xl" data-aos="fade-down">
              Leading the Way in Sustainable and Innovative Mining
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="text-gray-600 body-font mr-5 md:mr-36 ml-5 md:ml-36">
      <div class="container px-5 py-24 mx-auto">
        
        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
          <div class="p-4 md:w-1/3 flex">
            <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-orange-100 text-orange-500 mb-4 flex-shrink-0">
             
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill w-6 h-6" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
              </svg>
            </div>
            <div class="flex-grow pl-6">
              <h2 class="text-gray-900 text-2xl title-font font-extrabold mb-2">Phone Number</h2>
              <p class="leading-relaxed text-base">
                0712 / 2589851<br> 
                9503865798 <br>
                9561453202</p>
              
            </div>
          </div>
          <div class="p-4 md:w-1/3 flex">
            <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-orange-100 text-orange-500 mb-4 flex-shrink-0">
              
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-paper-fill w-6 h-6" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6.5 9.5 3 7.5v-6A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v6l-3.5 2L8 8.75zM1.059 3.635 2 3.133v3.753L0 5.713V5.4a2 2 0 0 1 1.059-1.765M16 5.713l-2 1.173V3.133l.941.502A2 2 0 0 1 16 5.4zm0 1.16-5.693 3.337L16 13.372v-6.5Zm-8 3.199 7.941 4.412A2 2 0 0 1 14 16H2a2 2 0 0 1-1.941-1.516zm-8 3.3 5.693-3.162L0 6.873v6.5Z"/>
              </svg>
            </div>
            <div class="flex-grow pl-6">
              <h2 class="text-gray-900 text-2xl title-font font-extrabold mb-2">Email Address</h2>
              <p class="leading-relaxed text-base">info@dvsmining.com</p>
              
            </div>
          </div>
          <div class="p-4 md:w-1/3 flex">
            <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-orange-100 text-orange-500 mb-4 flex-shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-fill w-6 h-6" viewBox="0 0 16 16">
                <path d="M3 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h3v-3.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V16h3a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm1 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5M4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5m2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5m2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5"/>
              </svg>
            </div>
            <div class="flex-grow pl-6">
              <h2 class="text-gray-900 text-2xl title-font font-extrabold mb-2">Office Location</h2>
              <p class="leading-relaxed text-base">G-4 Rachana Madhuban, Behind IOCL Petrol Pump, Koradi Road, Faras, NAGPUR -440030 (MH).</p>
              
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- Callback Section -->
<section class="text-gray-600 body-font relative mr-5 md:mr-36 ml-5 md:ml-36">
    <div class="container px-5 py-0 mx-auto flex sm:flex-nowrap flex-wrap rounded-2xl">
        <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
            <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=Mining%20Company%20Location&ie=UTF8&t=&z=14&iwloc=B&output=embed" style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
            <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                <div class="lg:w-1/2 px-6">
                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">OUR LOCATION</h2>
                    <p class="mt-1">123 Mining Ave, Industrial Park, City, State, ZIP</p>
                </div>
                <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">CONTACT EMAIL</h2>
                    <a class="text-orange-500 leading-relaxed">info@dvsmining.com</a>
                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">CONTACT PHONE</h2>
                    <p class="leading-relaxed">+1 (800) 123-4567</p>
                </div>
            </div>
        </div>
        <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0 p-5 rounded-2xl">
            <h2 class="text-orange-600 text-4xl mb-1 font-bold title-font mb-5">Request for Callback</h2>
            
           <!-- Add form for contact us -->
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <form method="POST" action="">
      <div class="flex flex-wrap -m-2">
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
            <input type="text" id="name" name="name" class="w-full bg-gray-100 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-base py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-1/2">
          <div class="relative">
            <label for="phone" class="leading-7 text-sm text-gray-600">Phone</label>
            <input type="text" id="phone" name="phone" class="w-full bg-gray-100 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-base py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-full">
          <div class="relative">
            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
            <input type="email" id="email" name="email" class="w-full bg-gray-100 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 text-base py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        <div class="p-2 w-full">
          <div class="relative">
            <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
            <textarea id="message" name="message" class="w-full bg-gray-100 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500 h-32 text-base py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          </div>
        </div>
        <div class="p-2 w-full">
          <button type="submit" class="flex mx-auto text-white bg-orange-500 border-0 py-2 px-8 focus:outline-none hover:bg-orange-600 rounded text-lg">Submit</button>
        </div>
      </div>
    </form>
  </div>
</section>

        </div>
    </div>
</section>

  

    </body>

  <script>
    AOS.init();
    $("#menu-toggle").click(function () {
      $("#mobile-menu").toggle();
    });
  </script>
</html>
