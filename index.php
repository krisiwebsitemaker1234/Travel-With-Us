<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Weather Info - Your Weather Companion</title>
  <script src="https://kit.fontawesome.com/dfba5e2447.js" crossorigin="anonymous"></script>
  <style>
    :root {
      --primary: #1F509A;
      --secondary: #0C359E;
      --accent: #EEF7FF;
      --dark: #0A2A5E;
      --light: #f8f9fa;
      --gray: #6c757d;
      --success: #28a745;
      --danger: #dc3545;
      --warning: #ffc107;
      --info: #17a2b8;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
      color: var(--accent);
      line-height: 1.6;
      min-height: 100vh;
    }

    .container {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 15px;
    }

    /* Hero Section */
    .hero {
      text-align: center;
      padding: 40px 0;
    }

    .hero h1 {
      font-size: 2.8rem;
      margin-bottom: 20px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero p {
      font-size: 1.2rem;
      max-width: 700px;
      margin: 0 auto 30px;
    }

    /* Search Section */
    .search-section {
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      padding: 30px;
      margin: 30px auto;
      max-width: 800px;
      backdrop-filter: blur(10px);
    }

    .search-section h2 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 1.8rem;
    }

    .search-container {
      display: flex;
      gap: 15px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .search-input {
      flex: 1;
      min-width: 250px;
      padding: 15px 20px;
      border: none;
      border-radius: 50px;
      background: rgba(255, 255, 255, 0.9);
      font-size: 1rem;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .search-input:focus {
      outline: none;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .search-btn {
      padding: 15px 25px;
      border: none;
      border-radius: 50px;
      background: var(--warning);
      color: var(--dark);
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .search-btn:hover {
      background: #e0a800;
      transform: translateY(-2px);
    }

    /* Destinations Grid */
    .destinations-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 25px;
      margin: 40px 0;
    }

    .destination-card {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      backdrop-filter: blur(10px);
    }

    .destination-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .destination-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .destination-info {
      padding: 20px;
    }

    .destination-name {
      font-size: 1.5rem;
      margin-bottom: 10px;
    }

    .destination-desc {
      margin-bottom: 15px;
      color: rgba(238, 247, 255, 0.8);
    }

    .weather-info {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-top: 15px;
      font-size: 0.9rem;
    }

    /* Subscription Section */
    .subscription {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      padding: 40px;
      margin: 50px auto;
      text-align: center;
      max-width: 800px;
      backdrop-filter: blur(10px);
    }

    .subscription h2 {
      margin-bottom: 20px;
    }

    .subscription p {
      margin-bottom: 25px;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }

    .subscribe-form {
      display: flex;
      gap: 15px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .email-input {
      flex: 1;
      min-width: 250px;
      padding: 15px 20px;
      border: none;
      border-radius: 50px;
      background: rgba(255, 255, 255, 0.9);
      font-size: 1rem;
    }

    .subscribe-btn {
      padding: 15px 30px;
      border: none;
      border-radius: 50px;
      background: var(--success);
      color: white;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .subscribe-btn:hover {
      background: #218838;
      transform: translateY(-2px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .navbar {
        flex-direction: column;
        gap: 15px;
        border-radius: 20px;
      }
      
      .nav-links {
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
      }
      
      .hero h1 {
        font-size: 2.2rem;
      }
      
      .search-container {
        flex-direction: column;
      }
      
      .search-input, .search-btn {
        width: 100%;
      }
      
      .footer-content {
        flex-direction: column;
      }
      
      .chatbot-window {
        width: 300px;
        right: -20px;
      }
    }

    /* Loading animation */
    .loader {
      display: inline-block;
      width: 20px;
      height: 20px;
      border: 3px solid rgba(255,255,255,.3);
      border-radius: 50%;
      border-top-color: #fff;
      animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }
  </style>
</head>
<body>

<?php include 'includes/navbar.php' ?>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1>Plan Your Trip with Perfect Weather</h1>
      <p>Get accurate weather forecasts for your travel destinations and make the most of your journey</p>
    </div>
  </section>

  <!-- Search Section -->
  <section class="search-section">
    <div class="container">
      <h2>Where Are You Headed?</h2>
      <div class="search-container">
        <input type="text" class="search-input" placeholder="Enter a city or country..." id="destinationSearch">
        <button class="search-btn" id="searchBtn">
          <i class="fas fa-search"></i> Search
        </button>
      </div>
    </div>
  </section>

  <!-- Destinations Grid -->
  <section class="container">
    <h2 style="text-align: center; margin-bottom: 30px;">Popular Destinations</h2>
    <div class="destinations-grid" id="destinationsGrid">
      <!-- Destination cards will be dynamically loaded here -->
    </div>
  </section>

  <!-- Subscription Section -->
  <section class="subscription">
    <div class="container">
      <h2>Stay Updated with Travel Weather</h2>
      <p>Subscribe to our newsletter for weather alerts, travel tips, and exclusive destination guides</p>
      <form class="subscribe-form" id="subscribeForm">
        <input type="email" class="email-input" placeholder="Your email address" required>
        <button type="submit" class="subscribe-btn">Subscribe</button>
      </form>
    </div>
  </section>

  <?php include 'includes/footer.php' ?>
  <?php include 'includes/chatbot.php' ?>

  <script>
    // Sample destination data - will be replaced with database data
    const destinations = [
      {
        id: 1,
        name: "Barcelona, Spain",
        image: "images/barcelona.webp",
        description: "Vibrant city with stunning architecture and beautiful beaches.",
        weather: "Mild Mediterranean climate with warm summers and cool winters"
      },
      {
        id: 2,
        name: "Paris, France",
        image: "images/paris.jpg",
        description: "The City of Light, famous for its art, culture, and cuisine.",
        weather: "Temperate climate with warm summers and cold, cloudy winters"
      },
      {
        id: 3,
        name: "Tirana, Albania",
        image: "images/tirana.png",
        description: "Colorful capital with a mix of Ottoman, Italian and communist architecture.",
        weather: "Mediterranean climate with hot, dry summers and cool, wet winters"
      },
      {
        id: 4,
        name: "London, UK",
        image: "images/london.png",
        description: "Historic city with iconic landmarks and world-class museums.",
        weather: "Temperate maritime climate with moderate temperatures throughout the year"
      },
      {
        id: 5,
        name: "Rome, Italy",
        image: "images/roma.jpg",
        description: "The Eternal City, home to ancient ruins and incredible food.",
        weather: "Mediterranean climate with hot, dry summers and mild, wet winters"
      },
      {
        id: 6,
        name: "Milan, Italy",
        image: "images/milan.jpg",
        description: "Fashion capital with stunning architecture and vibrant nightlife.",
        weather: "Humid subtropical climate with hot, humid summers and cold, foggy winters"
      }
    ];

    // DOM Elements
    const destinationsGrid = document.getElementById('destinationsGrid');
    const searchBtn = document.getElementById('searchBtn');
    const destinationSearch = document.getElementById('destinationSearch');
    const subscribeForm = document.getElementById('subscribeForm');
    const chatbotBtn = document.getElementById('chatbotBtn');
    const chatbotWindow = document.getElementById('chatbotWindow');
    const closeChatbot = document.getElementById('closeChatbot');
    const sendMessage = document.getElementById('sendMessage');
    const chatbotInput = document.getElementById('chatbotInput');
    const chatbotMessages = document.getElementById('chatbotMessages');

    // Load destinations
    function loadDestinations(filter = '') {
      destinationsGrid.innerHTML = '';
      
      const filteredDestinations = filter ? 
        destinations.filter(dest => 
          dest.name.toLowerCase().includes(filter.toLowerCase()) ||
          dest.description.toLowerCase().includes(filter.toLowerCase())
        ) : 
        destinations;
      
      if (filteredDestinations.length === 0) {
        destinationsGrid.innerHTML = `
          <div style="grid-column: 1 / -1; text-align: center; padding: 40px;">
            <h3>No destinations found</h3>
            <p>Try searching for a different location</p>
          </div>
        `;
        return;
      }
      
      filteredDestinations.forEach(destination => {
        const card = document.createElement('div');
        card.className = 'destination-card';
        card.innerHTML = `
          <img src="${destination.image}" alt="${destination.name}" class="destination-img">
          <div class="destination-info">
            <h3 class="destination-name">${destination.name}</h3>
            <p class="destination-desc">${destination.description}</p>
            <div class="weather-info">
              <i class="fas fa-cloud-sun"></i>
              <span>${destination.weather}</span>
            </div>
            <button class="search-btn" style="margin-top: 15px; width: 100%;" 
                    onclick="getWeatherInfo('${destination.name}')">
              <i class="fas fa-info-circle"></i> Get Weather Info
            </button>
          </div>
        `;
        destinationsGrid.appendChild(card);
      });
    }

    // Search functionality
    searchBtn.addEventListener('click', () => {
      loadDestinations(destinationSearch.value);
    });

    destinationSearch.addEventListener('keypress', (e) => {
      if (e.key === 'Enter') {
        loadDestinations(destinationSearch.value);
      }
    });

    // Subscription form
    subscribeForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const email = subscribeForm.querySelector('input[type="email"]').value;
      
      // In a real application, you would send this to your backend
      subscribeForm.innerHTML = `
        <div style="text-align: center;">
          <i class="fas fa-check-circle" style="font-size: 3rem; color: var(--success); margin-bottom: 15px;"></i>
          <h3>Thank you for subscribing!</h3>
          <p>We've sent a confirmation email to ${email}</p>
        </div>
      `;
      
      // Reset form after 5 seconds
      setTimeout(() => {
        subscribeForm.innerHTML = `
          <input type="email" class="email-input" placeholder="Your email address" required>
          <button type="submit" class="subscribe-btn">Subscribe</button>
        `;
        // Re-add event listener to the new button
        document.querySelector('.subscribe-btn').addEventListener('click', (e) => {
          subscribeForm.dispatchEvent(new Event('submit'));
        });
      }, 5000);
    });

    // Chatbot functionality
    chatbotBtn.addEventListener('click', () => {
      chatbotWindow.style.display = 'flex';
    });

    closeChatbot.addEventListener('click', () => {
      chatbotWindow.style.display = 'none';
    });

    sendMessage.addEventListener('click', () => {
      const message = chatbotInput.value.trim();
      if (message) {
        addMessage(message, 'user');
        chatbotInput.value = '';
        
        // Simulate bot response
        setTimeout(() => {
          addMessage("I'm a simple chatbot. In a real application, I would connect to a travel API to help you with your questions.", 'bot');
        }, 1000);
      }
    });

    function addMessage(text, sender) {
      const messageDiv = document.createElement('div');
      messageDiv.className = `message ${sender}-message`;
      messageDiv.textContent = text;
      chatbotMessages.appendChild(messageDiv);
      chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }

    // Simulate getting weather info from API
    function getWeatherInfo(destination) {
      // Show loading state
      const originalText = event.target.innerHTML;
      event.target.innerHTML = '<span class="loader"></span> Loading...';
      
      // In a real application, this would call a weather API
      setTimeout(() => {
        alert(`Weather information for ${destination} would be displayed here. In a real application, this would connect to a weather API.`);
        event.target.innerHTML = originalText;
      }, 1500);
    }

    // Initialize page
    document.addEventListener('DOMContentLoaded', () => {
      loadDestinations();
    });
  </script>
</body>
</html>