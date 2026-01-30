<!-- <!DOCTYPE php> -->
<!DOCTYPE html>
<!-- <php lang="en"> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribute Muftwater | FreeWater Distribution</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .distribute-hero {
            position: relative;
            padding: 7rem 1.5rem 4rem;
            background: radial-gradient(circle at top left, #e0f7ff 0, #f5fbff 40%, #ffffff 100%);
            overflow: hidden;
        }
        .distribute-hero .container {
            max-width: 1120px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
            gap: 3rem;
            align-items: center;
        }
        .distribute-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 0.85rem;
            border-radius: 999px;
            background: rgba(56, 189, 248, 0.1);
            color: #0f7490;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }
        .distribute-hero h1 {
            font-family: "Playfair Display", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            font-size: clamp(2.4rem, 3.1vw, 3.2rem);
            line-height: 1.1;
            margin: 1rem 0 1.2rem;
            color: #0c4a6e;
        }
        .distribute-hero h1 span.accent {
            display: block;
            color: #0284c7;
        }
        .distribute-hero p.lead {
            font-size: 1.05rem;
            line-height: 1.7;
            color: #4b5563;
            max-width: 32rem;
        }
        .distribute-hero-highlights {
            display: flex;
            flex-wrap: wrap;
            gap: 1.25rem;
            margin-top: 1.75rem;
        }
        .distribute-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.55rem 0.9rem;
            border-radius: 999px;
            background: rgba(59, 130, 246, 0.06);
            color: #0f172a;
            font-size: 0.9rem;
        }
        .distribute-pill span.icon {
            width: 1.6rem;
            height: 1.6rem;
            border-radius: 999px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(15, 118, 110, 0.08);
        }
        .distribute-hero-visual {
            position: relative;
        }
        .distribute-hero-image {
            position: absolute;
            top: -2rem;
            right: -2rem;
            width: 280px;
            height: 280px;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(15, 23, 42, 0.15);
            z-index: 0;
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }
        .distribute-hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .distribute-hero-image-2 {
            position: absolute;
            bottom: -1.5rem;
            left: -1.5rem;
            width: 180px;
            height: 180px;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(15, 23, 42, 0.12);
            z-index: -1;
            opacity: 0.7;
        }
        .distribute-hero-image-2 img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .distribute-hero-card {
            position: relative;
            background: white;
            border-radius: 1.75rem;
            padding: 2rem 2.25rem;
            box-shadow: 0 20px 60px rgba(15, 23, 42, 0.12);
            border: 1px solid rgba(148, 163, 184, 0.25);
        }
        .distribute-hero-card h2 {
            font-size: 1.35rem;
            margin: 0 0 0.5rem;
            color: #0f172a;
        }
        .distribute-hero-card p {
            font-size: 0.95rem;
            color: #6b7280;
            margin-bottom: 1.25rem;
        }
        .distribute-hero-badges {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }
        .distribute-hero-badge {
            padding: 0.75rem 0.85rem;
            border-radius: 1rem;
            background: #f9fafb;
            display: flex;
            flex-direction: column;
            gap: 0.1rem;
        }
        .distribute-hero-badge span.label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #6b7280;
        }
        .distribute-hero-badge span.value {
            font-size: 0.98rem;
            color: #0f172a;
            font-weight: 600;
        }
        .distribute-hero-note {
            display: flex;
            align-items: center;
            gap: 0.55rem;
            font-size: 0.82rem;
            color: #6b7280;
        }
        .distribute-hero-note span.dot {
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 999px;
            background: #22c55e;
            box-shadow: 0 0 0 6px rgba(34, 197, 94, 0.22);
        }
        .distribute-main {
            padding: 0 1.5rem 4.5rem;
            background: linear-gradient(to bottom, #ffffff 0%, #f8fafc 100%);
        }
        .distribute-gallery {
            margin-top: 3rem;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
        }
        .distribute-gallery-item {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .distribute-gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(15, 23, 42, 0.15);
        }
        .distribute-gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }
        .distribute-main .container {
            max-width: 1120px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.95fr);
            gap: 3.5rem;
            align-items: flex-start;
        }
        .distribute-copy {
            position: relative;
        }
        .distribute-copy-image {
            width: 100%;
            max-width: 500px;
            border-radius: 1.5rem;
            overflow: hidden;
            margin-bottom: 2rem;
            box-shadow: 0 15px 40px rgba(15, 23, 42, 0.12);
        }
        .distribute-copy-image img {
            width: 100%;
            height: auto;
            display: block;
        }
        .distribute-copy h2 {
            font-size: 1.6rem;
            color: #0f172a;
            margin-bottom: 0.75rem;
        }
        .distribute-copy p {
            font-size: 0.98rem;
            line-height: 1.8;
            color: #4b5563;
            margin-bottom: 1.5rem;
        }
        .distribute-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.75rem 1.25rem;
        }
        .distribute-list li {
            font-size: 0.95rem;
            color: #0f172a;
            display: flex;
            align-items: flex-start;
            gap: 0.45rem;
        }
        .distribute-list li span.check {
            color: #0ea5e9;
            margin-top: 0.1rem;
        }
        .distribute-form-card {
            background: white;
            border-radius: 1.75rem;
            padding: 2rem 2.25rem;
            box-shadow: 0 18px 50px rgba(15, 23, 42, 0.12);
            border: 1px solid rgba(148, 163, 184, 0.3);
            position: relative;
            overflow: hidden;
        }
        .distribute-form-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 200px;
            height: 200px;
            background: url('assets/images/sam1.png') no-repeat center;
            background-size: contain;
            opacity: 0.05;
            pointer-events: none;
        }
        .distribute-form-card h3 {
            font-size: 1.25rem;
            margin-bottom: 0.35rem;
            color: #0f172a;
        }
        .distribute-form-card p {
            font-size: 0.9rem;
            color: #6b7280;
            margin-bottom: 1.5rem;
        }
        .distribute-form .form-row {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
        }
        .distribute-form .form-group {
            margin-bottom: 1rem;
        }
        .distribute-form label {
            display: block;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #6b7280;
            margin-bottom: 0.35rem;
        }
        .distribute-form input,
        .distribute-form select,
        .distribute-form textarea {
            width: 100%;
            border-radius: 0.9rem;
            border: 1px solid #d1d5db;
            padding: 0.7rem 0.9rem;
            font-size: 0.92rem;
            font-family: inherit;
            color: #111827;
            background: #f9fafb;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }
        .distribute-form input:focus,
        .distribute-form select:focus,
        .distribute-form textarea:focus {
            outline: none;
            border-color: #0ea5e9;
            background: #ffffff;
            box-shadow: 0 0 0 1px rgba(14, 165, 233, 0.35);
        }
        .distribute-form textarea {
            resize: vertical;
            min-height: 80px;
        }
        .distribute-form .checkbox-group {
            margin: 0.5rem 0 1.3rem;
        }
        .distribute-form .checkbox-group label {
            display: flex;
            align-items: flex-start;
            gap: 0.45rem;
            font-size: 0.86rem;
            text-transform: none;
            letter-spacing: 0;
            color: #4b5563;
        }
        .distribute-form .checkbox-group input[type="checkbox"] {
            margin-top: 0.12rem;
        }
        .distribute-form .btn-full {
            width: 100%;
        }
        @media (max-width: 960px) {
            .distribute-hero .container {
                grid-template-columns: minmax(0, 1fr);
                gap: 2.5rem;
            }
            .distribute-main .container {
                grid-template-columns: minmax(0, 1fr);
            }
            .distribute-form-card {
                padding: 1.75rem 1.6rem;
            }
        }
        @media (max-width: 640px) {
            .distribute-hero {
                padding-top: 5.5rem;
            }
            .distribute-hero .container {
                grid-template-columns: minmax(0, 1fr);
                gap: 2rem;
            }
            .distribute-hero-visual {
                width: 100%;
            }
            .distribute-hero-card {
                max-width: 360px;
                margin: 0 auto;
                text-align: center;
            }
            .distribute-hero-badges {
                grid-template-columns: minmax(0, 1fr);
            }
            .distribute-hero-badge {
                align-items: flex-start;
            }
            .distribute-hero-image {
                width: 200px;
                height: 200px;
                top: -1rem;
                right: -1rem;
            }
            .distribute-hero-image-2 {
                width: 120px;
                height: 120px;
                bottom: -1rem;
                left: -1rem;
            }
            .distribute-main {
                padding-inline: 1.1rem;
            }
            .distribute-form .form-row {
                grid-template-columns: minmax(0, 1fr);
            }
            .distribute-gallery {
                grid-template-columns: minmax(0, 1fr);
            }
            .distribute-list {
                grid-template-columns: minmax(0, 1fr);
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php#home" class="logo">
                <svg class="logo-icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="20" r="18" stroke="currentColor" stroke-width="2"/>
                    <path d="M20 8C20 8 12 16 12 22C12 26.4183 15.5817 30 20 30C24.4183 30 28 26.4183 28 22C28 16 20 8 20 8Z" fill="currentColor"/>
                </svg>
                <span>Muftwater</span>
            </a>
            <ul class="nav-links">
                <li><a href="index.php#home">Home</a></li>
                <li><a href="advertise.php">Advertise</a></li>
                <li><a href="index.php#impact">Impact</a></li>
                 <li><a href="distribute.php" class="active">Distribute</a></li>
                <li><a href="contact-us.php">Contact</a></li>
            </ul>
            <a href="index.php#subscribe" class="nav-cta">Get a Quote</a>
            <button class="mobile-menu-btn" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- Hero -->
    <section class="distribute-hero">
        <div class="container">
            <div>
                <div class="distribute-badge">
                    <span>Distribute Muftwater®</span>
                    <span>Because water should be free</span>
                </div>
                <h1>
                    Bring Free Water<br>
                    <span class="accent">To Your Event or Business</span>
                </h1>
                <p class="lead">
                    Whether you're hosting an event or managing a high-traffic location, become a Muftwater distributor
                    and offer premium free water that funds clean water projects worldwide.
                </p>
                <div class="distribute-hero-highlights">
                    <div class="distribute-pill">
                        <span class="icon">📍</span>
                        <span>Perfect for venues, campuses, and offices</span>
                    </div>
                    <div class="distribute-pill">
                        <span class="icon">🤝</span>
                        <span>Backed by ethical, impact-driven advertisers</span>
                    </div>
                    <div class="distribute-pill">
                        <span class="icon">💧</span>
                        <span>Every sip supports clean water access</span>
                    </div>
                </div>
            </div>
            <div class="distribute-hero-visual">
                <div class="distribute-hero-card">
                    <h2>Start the Conversation</h2>
                    <p>Tell us about your location and audience. Our team will review your application and connect you with potential advertisers.</p>
                    <div class="distribute-hero-badges">
                        <div class="distribute-hero-badge">
                            <span class="label">Ideal For</span>
                            <span class="value">Events & high-traffic spaces</span>
                        </div>
                        <div class="distribute-hero-badge">
                            <span class="label">Minimum Volume</span>
                            <span class="value">Flexible based on demand</span>
                        </div>
                        <div class="distribute-hero-badge">
                            <span class="label">Support</span>
                            <span class="value">Logistics & creative guidance</span>
                        </div>
                        <div class="distribute-hero-badge">
                            <span class="label">Impact</span>
                            <span class="value">Helps fund clean water projects</span>
                        </div>
                    </div>
                    <div class="distribute-hero-note">
                        <span class="dot"></span>
                        <span>We typically respond within 2–3 business days.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content + Form -->
    <main class="distribute-main">
        <div class="container">
            <section class="distribute-copy">
                <div class="distribute-copy-image">
                    <img src="assets/images/sam3.png" alt="Distribute Muftwater">
                </div>
                <h2>Why Distribute Muftwater?</h2>
                <p>
                    Distributing Muftwater means more than handing out beverages. You’re offering a premium free product
                    that people love, while aligning your brand or location with a powerful social mission. Our model is
                    funded by advertisers, so your guests, customers, or community never pay for the water.
                </p>
                <ul class="distribute-list">
                    <li><span class="check">✓</span><span>Delight guests with free, premium water</span></li>
                    <li><span class="check">✓</span><span>Stand out as a socially responsible space</span></li>
                    <li><span class="check">✓</span><span>Ideal for conferences, festivals, campuses, and offices</span></li>
                    <li><span class="check">✓</span><span>Leverage QR codes for engagement and offers</span></li>
                    <li><span class="check">✓</span><span>Partner with brands that care about impact</span></li>
                    <li><span class="check">✓</span><span>Be part of a movement to make water free</span></li>
                </ul>
                <div class="distribute-gallery">
                    <div class="distribute-gallery-item">
                        <img src="assets/images/sam.png" alt="Muftwater Distribution">
                    </div>
                    <div class="distribute-gallery-item">
                        <img src="assets/images/sam2.png" alt="Muftwater Bottles">
                    </div>
                    <div class="distribute-gallery-item">
                        <img src="assets/images/sam4.png" alt="Muftwater Event">
                    </div>
                </div>
            </section>

            <section class="distribute-form-card" id="form">
                <h3>Distribute Muftwater®</h3>
                <p>Fill out this short form and we’ll reach out with next steps and availability in your area.</p>
                <form class="distribute-form" id="distributeForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="distFirstName">First name</label>
                            <input type="text" id="distFirstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="distLastName">Last name</label>
                            <input type="text" id="distLastName" name="lastName" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="distEmail">Email</label>
                            <input type="email" id="distEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="distPhone">Phone Number</label>
                            <input type="tel" id="distPhone" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="distCompany">Company name</label>
                        <input type="text" id="distCompany" name="company">
                    </div>
                    <div class="form-group">
                        <label for="distBusinessType">Type of business</label>
                        <input type="text" id="distBusinessType" name="businessType" placeholder="e.g. Event venue, Retail, Non-profit">
                    </div>
                    <div class="form-group">
                        <label for="distIsEvent">Is it for an event?</label>
                        <select id="distIsEvent" name="isEvent">
                            <option value="">Select...</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="distDistributionAddress">Distribution point address</label>
                        <textarea id="distDistributionAddress" name="distributionAddress" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="distShippingAddress">Shipping address (if different)</label>
                        <textarea id="distShippingAddress" name="shippingAddress" rows="2"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="distFootTraffic">Daily foot traffic</label>
                            <input type="text" id="distFootTraffic" name="footTraffic" placeholder="Approximate number of people per day">
                        </div>
                        <div class="form-group">
                            <label for="distAgeRange">Age range</label>
                            <input type="text" id="distAgeRange" name="ageRange" placeholder="e.g. 18-35">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="distMonthlyVolume">Monthly beverage volume</label>
                        <input type="text" id="distMonthlyVolume" name="monthlyVolume" placeholder="How many beverages per month?">
                    </div>
                    <div class="form-group">
                        <label for="distLoadingDock">Elevated loading dock available?</label>
                        <select id="distLoadingDock" name="loadingDock">
                            <option value="">Select...</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="distWhy">Why do you want to distribute Muftwater?</label>
                        <textarea id="distWhy" name="whyDistribute" rows="3"></textarea>
                    </div>
                    <div class="form-group checkbox-group">
                        <label>
                            <input type="checkbox" name="shareWithAdvertisers">
                            <span>I agree to share this information with potential advertisers</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-full">
                        <span>Send Request</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </button>
                </form>
            </section>
        </div>
    </main>

    <!-- Success Modal (reuse global modal styling) -->
    <div class="modal" id="successModal">
        <div class="modal-content">
            <div class="modal-icon">✓</div>
            <h3>Request received!</h3>
            <p>Thank you for your interest in distributing Muftwater. Our team will get back to you shortly.</p>
            <button class="btn btn-primary" onclick="closeModal()">Got it!</button>
        </div>
    </div>

    <?php include 'footer.php'; ?>


    <script src="script.js"></script>
    <script>
        document.getElementById('distributeForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = this;
            const formData = new FormData(form);

            try {
                const response = await fetch('submit_distribute.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    // Show success modal and reset form
                    document.getElementById('successModal').classList.add('active');
                    document.body.style.overflow = 'hidden';
                    form.reset();
                } else {
                    const msg = result && result.message ? result.message : 'An error occurred while submitting your request.';
                    alert(msg);
                    if (result && result.errors) {
                        alert(result.errors.join('\n'));
                    }
                }
            } catch (error) {
                console.error('Error submitting distribute request:', error);
                alert('Unable to submit your request right now. Please try again later.');
            }
        });
    </script>
</body>
<!-- </php> -->
</html>