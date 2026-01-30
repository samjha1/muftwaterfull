<?php
$page = 'careers';
$jobs = [
    [
        'title' => 'Marketing Executive',
        'desc' => 'Drive brand partnerships and execute impactful campaigns that connect businesses with communities.',
        'responsibilities' => [
            'Develop and execute marketing strategies for brand partnerships',
            'Plan and manage on-ground activations and events',
            'Create compelling content for digital and print media',
            'Build relationships with potential brand partners',
            'Track campaign performance and ROI metrics'
        ],
        'requirements' => [
            '2+ years experience in marketing or brand management',
            'Strong communication and presentation skills',
            'Experience with event management and activations',
            'Creative mindset with analytical capabilities'
        ],
        'location' => 'Bengaluru',
        'type' => 'Full Time',
        'department' => 'Marketing'
    ],
    [
        'title' => 'Operations Manager',
        'desc' => 'Lead logistics and operations to ensure seamless delivery of water services across multiple locations.',
        'responsibilities' => [
            'Oversee day-to-day operations and logistics',
            'Coordinate with vendors and suppliers',
            'Manage city-wise operations and distribution',
            'Ensure quality standards and compliance',
            'Optimize operational efficiency and costs'
        ],
        'requirements' => [
            '3+ years experience in operations or logistics',
            'Strong organizational and leadership skills',
            'Experience managing multi-location operations',
            'Problem-solving and process improvement mindset'
        ],
        'location' => 'Mumbai',
        'type' => 'Full Time',
        'department' => 'Operations'
    ],
    [
        'title' => 'Business Development Intern',
        'desc' => 'Support growth initiatives and learn about purpose-driven business development.',
        'responsibilities' => [
            'Assist in partnership development and outreach',
            'Conduct market research and competitive analysis',
            'Support business growth initiatives',
            'Prepare presentations and proposals',
            'Help with client communication and follow-ups'
        ],
        'requirements' => [
            'Currently pursuing or recently completed degree',
            'Strong interest in business development',
            'Excellent communication skills',
            'Self-motivated and eager to learn'
        ],
        'location' => 'Remote',
        'type' => 'Internship',
        'department' => 'Business Development'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Careers at Muftwater | Join Our Mission</title>
    <meta name="description" content="Join Muftwater and help build a sustainable future through innovation, branding, and clean drinking water initiatives across India.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="logo">
                <svg class="logo-icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="20" cy="20" r="18" stroke="currentColor" stroke-width="2"/>
                    <path d="M20 8C20 8 12 16 12 22C12 26.4183 15.5817 30 20 30C24.4183 30 28 26.4183 28 22C28 16 20 8 20 8Z" fill="currentColor"/>
                </svg>
                <span>Muftwater</span>
            </a>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="advertise.php">Advertise</a></li>
                <li><a href="index.php#impact">Impact</a></li>
                <li><a href="distribute.php">Distribute</a></li>
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

<!-- Hero Section -->
<section class="careers-hero">
    <div class="container">
        <div class="careers-hero-content">
            <span class="careers-badge">Join Our Mission</span>
            <h1 class="careers-hero-title">Build Your Career While Creating Impact</h1>
            <p class="careers-hero-description">
                At Muftwater, we're building a purpose-driven brand that delivers free clean drinking water 
                while helping businesses create meaningful connections with communities. Join us in making 
                a real difference.
            </p>
        </div>
    </div>
</section>

<!-- Why Join Us -->
<section class="careers-why">
    <div class="container">
        <div class="section-header center">
            <span class="section-tag">Why Muftwater</span>
            <h2 class="section-title">Why Join Our Team?</h2>
            <p class="section-description">
                We're not just another company. We're a mission-driven organization where your work 
                directly impacts communities and creates lasting change.
            </p>
        </div>

        <div class="careers-values-grid">
            <div class="value-card">
                <div class="value-icon">💧</div>
                <h3>Purpose-Driven Work</h3>
                <p>Every project you work on contributes to providing free clean water to communities in need.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">🚀</div>
                <h3>Growth Opportunities</h3>
                <p>Fast-paced environment with opportunities to take ownership and grow your career.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">🤝</div>
                <h3>Collaborative Culture</h3>
                <p>Work with passionate team members who value creativity, innovation, and teamwork.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">⚖️</div>
                <h3>Work-Life Balance</h3>
                <p>We believe in sustainable productivity and support flexible working arrangements.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">🎯</div>
                <h3>Impact & Visibility</h3>
                <p>See your work create real-world impact with measurable results and community feedback.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">📚</div>
                <h3>Learning & Development</h3>
                <p>Continuous learning opportunities, mentorship, and skill development programs.</p>
            </div>
        </div>
    </div>
</section>


<!-- Open Positions -->
<section class="careers-positions">
    <div class="container">
        <div class="section-header center">
            <span class="section-tag">Open Roles</span>
            <h2 class="section-title">Join Our Team</h2>
            <p class="section-description">
                Explore our current openings and find the role that matches your skills and passion.
            </p>
        </div>

        <div class="careers-grid">
            <?php foreach ($jobs as $job): ?>
                <div class="career-card">
                    <div class="career-card-header">
                        <div class="career-department"><?= htmlspecialchars($job['department'] ?? 'General'); ?></div>
                        <h3 class="career-title"><?= htmlspecialchars($job['title']); ?></h3>
                        <p class="career-description"><?= htmlspecialchars($job['desc']); ?></p>
                    </div>

                    <div class="career-details">
                        <div class="career-meta">
                            <span class="meta-item">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 8C9.65685 8 11 6.65685 11 5C11 3.34315 9.65685 2 8 2C6.34315 2 5 3.34315 5 5C5 6.65685 6.34315 8 8 8Z" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M2 13.3333C2 11.1242 3.79086 9.33333 6 9.33333H10C12.2091 9.33333 14 11.1242 14 13.3333" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                                <?= htmlspecialchars($job['location']); ?>
                            </span>
                            <span class="meta-item">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="3" width="12" height="10" rx="2" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M2 6H14" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M5 9H7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                                <?= htmlspecialchars($job['type']); ?>
                            </span>
                        </div>

                        <?php if (isset($job['responsibilities']) && !empty($job['responsibilities'])): ?>
                        <div class="career-responsibilities">
                            <h4>Key Responsibilities:</h4>
                            <ul>
                                <?php foreach (array_slice($job['responsibilities'], 0, 3) as $responsibility): ?>
                                    <li><?= htmlspecialchars($responsibility); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="career-card-footer">
                        <button
                            type="button"
                            class="btn btn-primary career-apply-btn"
                            onclick="openApplicationModal('<?= htmlspecialchars($job['title'], ENT_QUOTES); ?>')"
                        >
                            Apply Now
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- No openings message -->
        <?php if (empty($jobs)): ?>
            <div class="no-jobs">
                <p>We don't have open roles right now, but we're always looking for talented individuals!</p>
                <p>Feel free to reach out at <a href="mailto:careers@muftwater.com">careers@muftwater.com</a></p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Application Process -->
<section class="careers-process">
    <div class="container">
        <div class="section-header center">
            <span class="section-tag">How It Works</span>
            <h2 class="section-title">Our Application Process</h2>
            <p class="section-description">
                We've designed a straightforward process to help you showcase your skills and learn about us.
            </p>
        </div>

        <div class="process-steps">
            <div class="process-step">
                <div class="step-number">1</div>
                <h3>Apply</h3>
                <p>Send us your resume and a brief note about why you're interested in joining Muftwater.</p>
            </div>
            <div class="process-step">
                <div class="step-number">2</div>
                <h3>Initial Review</h3>
                <p>Our team reviews your application and gets back to you within 5-7 business days.</p>
            </div>
            <div class="process-step">
                <div class="step-number">3</div>
                <h3>Interview</h3>
                <p>If selected, we'll schedule a conversation to learn more about you and share about the role.</p>
            </div>
            <div class="process-step">
                <div class="step-number">4</div>
                <h3>Decision</h3>
                <p>We'll make a decision and extend an offer to successful candidates.</p>
            </div>
        </div>
    </div>
</section>


<!-- Our Culture -->
<section class="careers-culture">
    <div class="container">
        <div class="culture-content">
            <div class="culture-text">
                <span class="section-tag">Our Culture</span>
                <h2 class="section-title">Work With Purpose</h2>
                <p>
                    At Muftwater, we believe that the best work happens when people are passionate about 
                    what they do. We foster an environment where creativity thrives, ownership is encouraged, 
                    and every team member has the opportunity to make a meaningful impact.
                </p>
                <p>
                    We value diversity, inclusion, and different perspectives. Our team is made up of 
                    individuals who are driven by purpose and committed to excellence. If you're someone 
                    who wants to build a career while creating positive change, you'll fit right in.
                </p>
            </div>
            <div class="culture-stats">
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Water Locations</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100K+</div>
                    <div class="stat-label">People Served</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">20+</div>
                    <div class="stat-label">Team Members</div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'footer.php'; ?>

<!-- Application Form Modal -->
<div class="application-modal" id="applicationModal">
    <div class="application-modal-content">
        <button class="application-modal-close" onclick="closeApplicationModal()" aria-label="Close">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        
        <div class="application-modal-header">
            <h2>Apply for Position</h2>
            <p class="application-position-name" id="applicationPositionName"></p>
        </div>

        <form id="careerApplicationForm" enctype="multipart/form-data">
            <input type="hidden" id="applicationPosition" name="position" value="">
            
            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">First Name <span class="required">*</span></label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name <span class="required">*</span></label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email">Email Address <span class="required">*</span></label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number <span class="required">*</span></label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
            </div>

            <div class="form-group">
                <label for="experience">Years of Experience</label>
                <select id="experience" name="experience">
                    <option value="">Select...</option>
                    <option value="0-1">0-1 years</option>
                    <option value="1-3">1-3 years</option>
                    <option value="3-5">3-5 years</option>
                    <option value="5-10">5-10 years</option>
                    <option value="10+">10+ years</option>
                </select>
            </div>

            <div class="form-group">
                <label for="linkedin">LinkedIn Profile (Optional)</label>
                <input type="url" id="linkedin" name="linkedin" placeholder="https://linkedin.com/in/yourprofile">
            </div>

            <div class="form-group">
                <label for="portfolio">Portfolio/Website (Optional)</label>
                <input type="url" id="portfolio" name="portfolio" placeholder="https://yourportfolio.com">
            </div>

            <div class="form-group">
                <label for="resume">Resume/CV <span class="required">*</span> <span class="file-hint">(PDF, DOC, DOCX - Max 5MB)</span></label>
                <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
            </div>

            <div class="form-group">
                <label for="coverLetter">Cover Letter <span class="required">*</span></label>
                <textarea id="coverLetter" name="coverLetter" rows="6" placeholder="Tell us why you're interested in this position and what makes you a great fit..." required></textarea>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeApplicationModal()">Cancel</button>
                <button type="submit" class="btn btn-primary">
                    <span id="submitButtonText">Submit Application</span>
                    <span id="submitButtonLoader" class="button-loader" style="display: none;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" stroke-opacity="0.25"/>
                            <path d="M12 2A10 10 0 0 0 2 12" stroke="currentColor" stroke-width="4" stroke-linecap="round">
                                <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" values="0 12 12;360 12 12"/>
                            </path>
                        </svg>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Success Modal -->
<div class="application-modal" id="applicationSuccessModal">
    <div class="application-modal-content success-modal-content">
        <div class="success-icon">✓</div>
        <h3>Application Submitted!</h3>
        <p>Thank you for your interest in joining Muftwater. We have received your application and will review it shortly. Our team will get back to you within 5-7 business days.</p>
        <button class="btn btn-primary" onclick="closeSuccessModal()">Got it!</button>
    </div>
</div>

    <script src="script.js"></script>
    <script>
        // Open application modal with position name
        function openApplicationModal(positionName) {
            const modal = document.getElementById('applicationModal');
            const positionInput = document.getElementById('applicationPosition');
            const positionNameDisplay = document.getElementById('applicationPositionName');
            
            positionInput.value = positionName;
            positionNameDisplay.textContent = positionName;
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // Close application modal
        function closeApplicationModal() {
            const modal = document.getElementById('applicationModal');
            modal.classList.remove('active');
            document.body.style.overflow = '';
            document.getElementById('careerApplicationForm').reset();
        }

        // Close success modal
        function closeSuccessModal() {
            const modal = document.getElementById('applicationSuccessModal');
            modal.classList.remove('active');
            document.body.style.overflow = '';
            closeApplicationModal(); // Also close the form modal
        }

        // Handle form submission
        document.getElementById('careerApplicationForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = this;
            const formData = new FormData(form);
            const submitButton = form.querySelector('button[type="submit"]');
            const submitText = document.getElementById('submitButtonText');
            const submitLoader = document.getElementById('submitButtonLoader');

            // Disable submit button and show loader
            submitButton.disabled = true;
            submitText.style.display = 'none';
            submitLoader.style.display = 'inline-block';

            try {
                const response = await fetch('submit_career_application.php', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    // Show success modal
                    document.getElementById('applicationModal').classList.remove('active');
                    document.getElementById('applicationSuccessModal').classList.add('active');
                    form.reset();
                } else {
                    // Show error message
                    const errorMsg = result && result.message ? result.message : 'An error occurred while submitting your application.';
                    alert(errorMsg);
                    if (result && result.errors) {
                        alert('Please fix the following errors:\n' + result.errors.join('\n'));
                    }
                }
            } catch (error) {
                console.error('Error submitting application:', error);
                alert('Unable to submit your application right now. Please try again later.');
            } finally {
                // Re-enable submit button
                submitButton.disabled = false;
                submitText.style.display = 'inline';
                submitLoader.style.display = 'none';
            }
        });

        // Close modal on background click
        document.addEventListener('click', (e) => {
            const modal = document.getElementById('applicationModal');
            const successModal = document.getElementById('applicationSuccessModal');
            
            if (modal && e.target === modal) {
                closeApplicationModal();
            }
            if (successModal && e.target === successModal) {
                closeSuccessModal();
            }
        });

        // Close modal on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeApplicationModal();
                closeSuccessModal();
            }
        });
    </script>
</body>
</html>

