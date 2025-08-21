  <!-- Navigation -->
  <nav class="navbar">
    <a href="index.html" class="logo">
      <img src="images/weather icon.webp" alt="Travel Weather Info Logo">
      <span>Travel Weather</span>
    </a>
    <div class="nav-links">
      <a href="index.html"><i class="fas fa-home"></i> Home</a>
      <a href="trending.html"><i class="fas fa-fire"></i> Trending</a>
      <a href="about.html"><i class="fas fa-info-circle"></i> About</a>
      <a href="contact.html"><i class="fas fa-phone"></i> Contact</a>
    </div>
  </nav>

  <style>
        /* Navigation */
    .navbar {
      background-color: var(--dark);
      border-radius: 50px;
      padding: 10px 20px;
      margin: 20px auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
      max-width: 1100px;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
      color: var(--accent);
      font-weight: 700;
      font-size: 1.2rem;
    }

    .logo img {
      width: 40px;
      height: 40px;
    }

    .nav-links {
      display: flex;
      gap: 30px;
    }

    .nav-links a {
      color: var(--accent);
      text-decoration: none;
      font-size: 1.1rem;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
    }

    .nav-links a:hover {
      color: var(--warning);
      transform: translateY(-2px);
    }
    </style>