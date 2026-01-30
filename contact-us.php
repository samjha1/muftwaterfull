<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Muftwater</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .contact-hero {
            padding-top: 7rem;
            padding-bottom: 4rem;
        }
        .contact-hero .container {
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
            gap: 3rem;
            align-items: center;
        }
        .contact-hero .adv-hero-title {
            margin-bottom: 0.8rem;
        }
        .contact-hero .adv-hero-subtitle {
            max-width: 34rem;
        }
        .contact-stats {
            margin-top: 1.75rem;
            display: flex;
            flex-wrap: wrap;
            gap: 1.2rem;
        }
        .contact-section {
            padding: 3.5rem 0 4.5rem;
            background: linear-gradient(to bottom, #ffffff 0%, #f8fafc 100%);
        }
        .contact-section .quote-wrapper {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
            gap: 3rem;
            align-items: flex-start;
        }
        .contact-section .quote-info h2 {
            margin-bottom: 0.6rem;
        }
        .contact-section .quote-info p {
            margin-bottom: 1.25rem;
        }
        .contact-section .quote-form-wrapper {
            background: #ffffff;
            border-radius: 1.75rem;
            padding: 2rem 2.25rem;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.12);
            border: 1px solid rgba(148, 163, 184, 0.3);
        }
        .contact-section .quote-form .form-row {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
        }
        .contact-section .quote-form .form-group {
            margin-bottom: 1rem;
        }
        .contact-section .quote-form label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #6b7280;
            margin-bottom: 0.35rem;
            display: block;
        }
        .contact-section .quote-form input,
        .contact-section .quote-form textarea {
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
        .contact-section .quote-form input:focus,
        .contact-section .quote-form textarea:focus {
            outline: none;
            border-color: #0ea5e9;
            background: #ffffff;
            box-shadow: 0 0 0 1px rgba(14, 165, 233, 0.35);
        }
        @media (max-width: 960px) {
            .contact-hero .container {
                grid-template-columns: minmax(0, 1fr);
            }
            .contact-section .quote-wrapper {
                grid-template-columns: minmax(0, 1fr);
            }
            .contact-section .quote-form-wrapper {
                padding: 1.75rem 1.6rem;
            }
        }
        @media (max-width: 640px) {
            .contact-hero {
                padding-top: 5.5rem;
            }
            .contact-section .quote-form .form-row {
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
                <li><a href="distribute.php">Distribute</a></li>
                <li><a href="contact-us.php" class="active">Contact</a></li>
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
    <section class="adv-hero contact-hero">
        <div class="adv-hero-bg"></div>
        <div class="container">
            <div class="adv-hero-content">
                <nav class="breadcrumb">
                    <a href="index.php">Home</a>
                    <span>/</span>
                    <span>Contact Us</span>
                </nav>
                <h1 class="adv-hero-title">Let’s Talk About Free Water</h1>
                <p class="adv-hero-subtitle">
                    Media, partnerships, questions, or ideas — we’d love to hear from you.
                </p>
                <div class="hero-stats contact-stats">
                    <div class="stat">
                        <span class="stat-number">24h</span>
                        <span class="stat-label">Typical Response Time</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">Global</span>
                        <span class="stat-label">Media & Partnerships</span>
                    </div>
                </div>
            </div>
            <div class="adv-hero-image">
                <img src="assets/images/sam2.png" alt="Muftwater Contact">
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="quote-section contact-section">
        <div class="container">
            <div class="quote-wrapper">
                <div class="quote-info">
                    <h2>Contact Us</h2>
                    <p>Fill out the form and our team will get back to you as soon as possible.</p>
                    <div class="quote-benefits">
                        <div class="quote-benefit">
                            <span class="benefit-check">✓</span>
                            <span>Media & press inquiries</span>
                        </div>
                        <div class="quote-benefit">
                            <span class="benefit-check">✓</span>
                            <span>Partnership opportunities</span>
                        </div>
                        <div class="quote-benefit">
                            <span class="benefit-check">✓</span>
                            <span>General questions</span>
                        </div>
                    </div>
                    <div class="quote-contact">
                        <p>Or reach us directly:</p>
                        <a href="mailto:contact@Muftwater.com">contact@Muftwater.com</a>
                    </div>
                </div>
                <div class="quote-form-wrapper">
                    <form class="quote-form" id="contactForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstName">First name *</label>
                                <input type="text" id="firstName" name="firstName" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last name *</label>
                                <input type="text" id="lastName" name="lastName" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone number</label>
                                <input type="tel" id="phone" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-full">
                            <span>Send Message</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    <div class="modal" id="successModal">
        <div class="modal-content">
            <div class="modal-icon">✓</div>
            <h3>Message sent!</h3>
            <p>Thank you for reaching out. We’ll get back to you soon.</p>
            <button class="btn btn-primary" onclick="closeModal()">Got it!</button>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = this;
            const formData = new FormData(form);

            try {
                const response = await fetch('submit_contact.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    document.getElementById('successModal').classList.add('active');
                    document.body.style.overflow = 'hidden';
                    form.reset();
                } else {
                    const msg = result && result.message ? result.message : 'An error occurred while submitting your message.';
                    alert(msg);
                    if (result && result.errors) {
                        alert(result.errors.join('\n'));
                    }
                }
            } catch (error) {
                console.error('Error submitting contact form:', error);
                alert('Unable to submit your message right now. Please try again later.');
            }
        });
    </script>
</body>
</php>