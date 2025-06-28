<?php
// Define site-wide constants
define('SITE_NAME', 'Camstri Chemistry Lab');
define('SITE_EMAIL', 'info@camstrichemlab.edu');
define('CURRENT_YEAR', date('Y'));

// Basic contact form handling
$contact_response = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if ($name && $email && $subject && $message) {
        // Email setup (requires mail server configuration)
        $to = SITE_EMAIL;
        $headers = "From: $email\r\nReply-To: $email\r\n";
        $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";
        if (mail($to, $subject, $body, $headers)) {
            $contact_response = '<p style="color: green;">Message sent successfully!</p>';
        } else {
            $contact_response = '<p style="color: red;">Failed to send message. Please try again later.</p>';
        }
    } else {
        $contact_response = '<p style="color: red;">All fields are required.</p>';
    }
}

// Define team and instrument data
$team = [
    [
        'name' => 'Dr. Emily Rodriguez',
        'role' => 'Postdoctoral Fellow',
        'description' => 'Focuses on environmental chemistry and pollution remediation.',
        'image' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1374&q=80',
        'alt' => 'Dr. Emily Rodriguez, Postdoctoral Fellow at Camstri Chemistry Lab',
        'email' => 'erodriguez@camstrichemlab.edu',
        'cv' => '/cv/emily-rodriguez.pdf'
    ],
    [
        'name' => 'Dr. Sarah Johnson',
        'role' => 'Principal Investigator',
        'description' => 'Expert in organic synthesis with 15+ years of research experience.',
        'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1376&q=80',
        'alt' => 'Dr. Sarah Johnson, Principal Investigator at Camstri Chemistry Lab',
        'email' => 'sjohnson@camstrichemlab.edu',
        'cv' => '/cv/sarah-johnson.pdf'
    ],
    [
        'name' => 'Dr. Michael Chen',
        'role' => 'Senior Researcher',
        'description' => 'Specializes in analytical chemistry and method development.',
        'image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1374&q=80',
        'alt' => 'Dr. Michael Chen, Senior Researcher at Camstri Chemistry Lab',
        'email' => 'mchen@camstrichemlab.edu',
        'cv' => '/cv/michael-chen.pdf'
    ],
    [
        'name' => 'Dr. Aisha Khan',
        'role' => 'Research Associate',
        'description' => 'Expert in materials science with a focus on sustainable polymers.',
        'image' => 'https://images.unsplash.com/photo-1607746882042-944635dfe10e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1376&q=80',
        'alt' => 'Dr. Aisha Khan, Research Associate at Camstri Chemistry Lab',
        'email' => 'akhan@camstrichemlab.edu',
        'cv' => '/cv/aisha-khan.pdf'
    ]
];

$students = [
    ['name' => 'Alex Turner', 'role' => 'PhD Candidate'],
    ['name' => 'Priya Patel', 'role' => 'PhD Candidate'],
    ['name' => 'James Wilson', 'role' => 'MSc Student'],
    ['name' => 'Sophia Kim', 'role' => 'MSc Student'],
    ['name' => 'David Zhang', 'role' => 'MSc Student'],
    ['name' => 'Lina Gupta', 'role' => 'MSc Student']
];

$instruments = [
    ['icon' => 'fas fa-chart-line', 'name' => 'HPLC System', 'description' => 'High-performance liquid chromatography for precise separation and analysis of complex mixtures.'],
    ['icon' => 'fas fa-fire', 'name' => 'GC-MS', 'description' => 'Gas chromatography-mass spectrometry for volatile compound identification and quantification.'],
    ['icon' => 'fas fa-atom', 'name' => 'NMR Spectrometer', 'description' => '400 MHz nuclear magnetic resonance spectrometer for molecular structure determination.'],
    ['icon' => 'fas fa-lightbulb', 'name' => 'UV-Vis Spectrophotometer', 'description' => 'Ultraviolet-visible spectroscopy for absorption measurements across a wide wavelength range.'],
    ['icon' => 'fas fa-temperature-high', 'name' => 'DSC', 'description' => 'Differential scanning calorimeter for thermal analysis of materials.'],
    ['icon' => 'fas fa-vial', 'name' => 'FTIR Spectrometer', 'description' => 'Fourier-transform infrared spectroscopy for functional group analysis.']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Camstri Chemistry Lab is dedicated to advancing chemical sciences through innovative research and collaboration.">
    <meta name="keywords" content="chemistry, research, innovation, lab, science, Camstri">
    <meta name="author" content="<?php echo SITE_NAME; ?>">
    <meta property="og:title" content="<?php echo SITE_NAME; ?> | Innovating the Future of Chemistry">
    <meta property="og:description" content="Explore groundbreaking chemical research at Camstri Chemistry Lab.">
    <meta property="og:image" content="https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80">
    <meta property="og:url" content="https://www.camstrichemlab.edu">
    <title><?php echo SITE_NAME; ?> | Innovating the Future of Chemistry</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="container">
            <div class="nav-header">
                <a href="#" class="logo">
                    <i class="fas fa-flask"></i>
                    <?php echo SITE_NAME; ?>
                </a>
                <button id="mobile-menu-button" class="mobile-menu-button" aria-label="Toggle mobile menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <div class="nav-menu">
                <div class="desktop-menu">
                    <a href="#home">Home</a>
                    <a href="#about">About</a>
                    <a href="#research">Research</a>
                    <a href="#instruments">Instruments</a>
                    <a href="#team">Team</a>
                    <a href="#contact">Contact</a>
                </div>
                <div id="mobile-menu" class="mobile-menu">
                    <div class="menu-items">
                        <a href="#home">Home</a>
                        <a href="#about">About</a>
                        <a href="#research">Research</a>
                        <a href="#instruments">Instruments</a>
                        <a href="#team">Team</a>
                        <a href="#contact">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section fade-in">
        <div class="container">
            <h1 class="slide-up">Innovating the Future of Chemistry</h1>
            <p class="slide-up">At <?php echo SITE_NAME; ?>, we push the boundaries of chemical research to solve real-world problems.</p>
            <div class="buttons slide-up">
                <a href="#research" class="primary">Our Research</a>
                <a href="#contact" class="secondary">Contact Us</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section section">
        <div class="container">
            <div class="section-title">
                <h2>About Our Lab</h2>
                <div class="divider"></div>
                <p>The <?php echo SITE_NAME; ?> is dedicated to advancing chemical sciences through innovative research and collaboration.</p>
            </div>
            <div class="about-grid">
                <div class="about-card animate-slide-left">
                    <div class="icon"><i class="fas fa-atom"></i></div>
                    <h3>Our Vision</h3>
                    <p>To be a global leader in chemical research that transforms scientific discoveries into solutions for society's most pressing challenges.</p>
                </div>
                <div class="about-card animate-slide-right">
                    <div class="icon"><i class="fas fa-microscope"></i></div>
                    <h3>Research Areas</h3>
                    <ul>
                        <li>• Organic Synthesis</li>
                        <li>• Analytical Chemistry</li>
                        <li>• Environmental Chemistry</li>
                        <li>• Materials Science</li>
                    </ul>
                </div>
                <div class="about-card animate-slide-left">
                    <div class="icon"><i class="fas fa-handshake"></i></div>
                    <h3>Collaborations</h3>
                    <p>We partner with universities, industries, and government agencies to maximize the impact of our research.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Research Section -->
    <section id="research" class="research-section section">
        <div class="container">
            <div class="section-title">
                <h2>Our Research</h2>
                <div class="divider"></div>
                <p>Explore our groundbreaking research projects that are shaping the future of chemistry.</p>
            </div>
            <div class="research-grid">
                <div class="research-card animate-slide-left">
                    <img src="https://images.unsplash.com/photo-1554475901-4538ddfbccc2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1472&q=80" 
                         srcset="https://images.unsplash.com/photo-1554475901-4538ddfbccc2?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60 500w,
                                 https://images.unsplash.com/photo-1554475901-4538ddfbccc2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1472&q=80 1472w"
                         sizes="(max-width: 600px) 500px, 1472px"
                         alt="Sustainable synthesis laboratory setup">
                    <div class="content">
                        <h3>Sustainable Synthesis</h3>
                        <p>Developing eco-friendly synthetic routes for pharmaceutical intermediates.</p>
                        <a href="/research/sustainable-synthesis">Read More →</a>
                    </div>
                </div>
                <div class="research-card animate-slide-right">
                    <img src="https://images.unsplash.com/photo-1581094271901-8022df4466f9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1440&q=80" 
                         srcset="https://images.unsplash.com/photo-1581094271901-8022df4466f9?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=60 500w,
                                 https://images.unsplash.com/photo-1581094271901-8022df4466f9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1440&q=80 1440w"
                         sizes="(max-width: 600px) 500px, 1440px"
                         alt="Nanomaterials research equipment">
                    <div class="content">
                        <h3>Advanced Materials</h3>
                        <p>Designing novel nanomaterials for energy storage applications.</p>
                        <a href="/research/advanced-materials">Read More →</a>
                    </div>
                </div>
                <div class="research-card animate-slide-left">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvL6Q_lQW_sj5rXUEGtF6IRHr2NN-FqNYpqVOGOHlfegThTcVIBFXUrOBo&s=10" 
                         alt="Environmental monitoring water analysis">
                    <div class="content">
                        <h3>Environmental Monitoring</h3>
                        <p>New analytical methods for detecting pollutants in water systems.</p>
                        <a href="/research/environmental-monitoring">Read More →</a>
                    </div>
                </div>
            </div>
            <div class="cta">
                <a href="/publications">View All Publications <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Instruments Section -->
    <section id="instruments" class="instruments-section section">
        <div class="container">
            <div class="section-title">
                <h2>Our Instruments</h2>
                <div class="divider"></div>
                <p>State-of-the-art equipment enabling cutting-edge research.</p>
            </div>
            <div class="instruments-grid">
                <?php
                foreach ($instruments as $index => $instrument) {
                    $animation = ($index % 2 == 0) ? 'animate-slide-right' : 'animate-slide-left';
                    echo "
                    <div class='instrument-card $animation'>
                        <div class='icon-wrapper'>
                            <div class='icon'><i class='{$instrument['icon']}'></i></div>
                            <h3>{$instrument['name']}</h3>
                        </div>
                        <p>{$instrument['description']}</p>
                    </div>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="team-section section">
        <div class="container">
            <div class="section-title">
                <h2 style="color: #fff;">Our Team</h2>
                <div class="divider"></div>
                <p>Meet the brilliant minds driving our research forward.</p>
            </div>
            <div class="team-grid">
                <?php
                foreach ($team as $index => $member) {
                    $animation = ($index % 2 == 0) ? 'animate-slide-left' : 'animate-slide-right';
                    echo "
                    <div class='team-card $animation'>
                        <img src='{$member['image']}' alt='{$member['alt']}'>
                        <div class='content'>
                            <h3>{$member['name']}</h3>
                            <p class='role'>{$member['role']}</p>
                            <p>{$member['description']}</p>
                            <div class='social-links'>
                                <a href='https://linkedin.com' aria-label='LinkedIn profile of {$member['name']}'><i class='fab fa-linkedin'></i></a>
                                <a href='mailto:{$member['email']}' aria-label='Email {$member['name']}'><i class='fas fa-envelope'></i></a>
                                <a href='{$member['cv']}' aria-label='Download {$member['name']}\'s CV'><i class='fas fa-file-pdf'></i></a>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
            <div class="students-grid">
                <h3>Graduate Students</h3>
                <div class="students-grid">
                    <?php
                    foreach ($students as $index => $student) {
                        $animation = ($index % 2 == 0) ? 'animate-slide-right' : 'animate-slide-left';
                        echo "
                        <div class='student-card $animation'>
                            <h3>{$student['name']}</h3>
                            <p class='role'>{$student['role']}</p>
                        </div>";
                    }
                    ?>
                </div>
                <p class="edit-note" style="color: #bfdbfe; font-size: 0.9rem; margin-top: 2rem;">To update team data, edit the $team or $students arrays at the top of index.php with new member details.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section section">
        <div class="container">
            <div class="section-title">
                <h2>Contact Us</h2>
                <div class="divider"></div>
                <p>We'd love to hear from you. Reach out for collaborations, inquiries, or to learn more about our work.</p>
            </div>
            <?php if ($contact_response) echo $contact_response; ?>
            <div class="contact-grid">
                <div>
                    <div class="contact-info animate-slide-left">
                        <h3>Get In Touch</h3>
                        <div class="info-item">
                            <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <h4>Address</h4>
                                <p>Department of Chemistry<br>University Science Building<br>123 Research Drive<br>City, State 12345</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="icon"><i class="fas fa-envelope"></i></div>
                            <div>
                                <h4>Email</h4>
                                <p><?php echo SITE_EMAIL; ?><br>research@camstrichemlab.edu</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="icon"><i class="fas fa-phone"></i></div>
                            <div>
                                <h4>Phone</h4>
                                <p>+1 (555) 123-4567<br>Lab: +1 (555) 987-6543</p>
                            </div>
                        </div>
                    </div>
                    <div class="lab-hours">
                        <h3>Lab Hours</h3>
                        <ul>
                            <li><span>Monday - Friday</span><span>8:00 AM - 6:00 PM</span></li>
                            <li><span>Saturday</span><span>10:00 AM - 4:00 PM</span></li>
                            <li><span>Sunday</span><span>Closed</span></li>
                        </ul>
                    </div>
                </div>
                <div class="contact-form animate-slide-right">
                    <h3>Send Us a Message</h3>
                    <form id="contact-form" action="#contact" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit">Send Message <i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
             <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215256018511!2d-73.98784492423938!3d40.74844097138961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1689784290551!5m2!1sen!2sus" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Camstri Chemistry Lab Location"></iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="logo-section">
                    <div class="logo">
                        <i class="fas fa-flask text-2xl" style="color: #93c5fd;"></i>
                        <span><?php echo SITE_NAME; ?></span>
                    </div>
                    <p>Advancing chemical sciences through innovative research and collaboration.</p>
                </div>
                <div>
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#research">Research</a></li>
                        <li><a href="#team">Team</a></li>
                    </ul>
                </div>
                <div>
                    <h3>Resources</h3>
                    <ul>
                        <li><a href="/publications">Publications</a></li>
                        <li><a href="/lab-safety">Lab Safety</a></li>
                        <li><a href="/protocols">Protocols</a></li>
                        <li><a href="/news">News</a></li>
                    </ul>
                </div>
                <div class="newsletter">
                    <h3>Connect With Us</h3>
                    <div class="social-links">
                        <a href="https://twitter.com" aria-label="Follow us on Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="https://linkedin.com" aria-label="Connect on LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="https://researchgate.net" aria-label="Follow on ResearchGate"><i class="fab fa-researchgate"></i></a>
                        <a href="https://github.com" aria-label="View our GitHub"><i class="fab fa-github"></i></a>
                    </div>
                    <p>Subscribe to our newsletter</p>
                    <form id="newsletter-form" action="/subscribe" method="POST">
                        <input type="email" name="email" placeholder="Your email" required>
                        <button type="submit" aria-label="Subscribe to newsletter"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© <?php echo CURRENT_YEAR; ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('open');
                mobileMenuButton.setAttribute('aria-expanded', mobileMenu.classList.contains('open'));
            });
        }

        // Scroll animations
        const sections = document.querySelectorAll('.section');
        const cards = document.querySelectorAll('.about-card, .research-card, .instrument-card, .team-card, .student-card, .contact-info, .contact-form, .map-container');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        sections.forEach(section => observer.observe(section));
        cards.forEach(card => observer.observe(card));

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                if (mobileMenu && mobileMenu.classList.contains('open')) {
                    mobileMenu.classList.remove('open');
                    if (mobileMenuButton) {
                        mobileMenuButton.setAttribute('aria-expanded', 'false');
                    }
                }
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Basic newsletter form validation (placeholder)
        const newsletterForm = document.getElementById('newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', (e) => {
                e.preventDefault();
                alert('Newsletter subscription is not yet implemented. Please configure a backend service.');
            });
        }
    </script>
</body>
</html>