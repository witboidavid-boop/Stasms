<?php
/**
 * Home Page - Setlight Secondary School Buzzi
 * Professional landing page for the Classroom Scheduling System
 */

require_once 'includes/config.php';
require_once 'includes/auth.php';

$auth = getAuth();

// Redirect if already logged in
if ($auth->isLoggedIn()) {
    $user = $auth->getCurrentUser();
    if ($user['role'] === 'admin') {
        header('Location: admin/dashboard.php');
    } else {
        header('Location: teacher/dashboard.php');
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - <?php echo APP_NAME; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --color-primary: <?php echo COLOR_PRIMARY; ?>;
            --color-secondary: <?php echo COLOR_SECONDARY; ?>;
            --color-accent: <?php echo COLOR_ACCENT; ?>;
            --color-bg: <?php echo COLOR_BACKGROUND; ?>;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .gradient-primary {
            background: linear-gradient(135deg, var(--color-primary) 0%, #FF7700 100%);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--color-bg) 0%, #FFECCC 100%);
        }
        
        .btn-primary {
            background-color: var(--color-primary);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #E68900;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        
        .btn-secondary {
            background-color: var(--color-secondary);
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background-color: #007722;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        
        .feature-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
            border-color: var(--color-primary);
        }
        
        .icon-box {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--color-primary), #FF7700);
            border-radius: 12px;
            color: white;
            font-size: 28px;
            margin-bottom: 1rem;
        }
        
        .navbar {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .hero-section {
            min-height: 600px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #FF9900 0%, #FF7700 50%, #FF9900 100%);
            opacity: 0.1;
            z-index: 0;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
        }
        
        .stats-box {
            padding: 2rem;
            background: white;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--color-primary);
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 3rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--color-primary), var(--color-secondary));
            border-radius: 2px;
        }
        
        .testimonial-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-left: 4px solid var(--color-primary);
        }
        
        .testimonial-stars {
            color: var(--color-primary);
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }
        
        footer {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            color: white;
        }
        
        .footer-link {
            color: #ccc;
            transition: color 0.3s ease;
        }
        
        .footer-link:hover {
            color: var(--color-primary);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation Bar -->
    <nav class="navbar bg-white sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="p-2 bg-orange-100 rounded-lg">
                    <i class="fas fa-chalkboard-teacher text-orange-600 text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800"><?php echo APP_NAME; ?></h1>
                    <p class="text-xs text-gray-600">Wakiso District, Uganda</p>
                </div>
            </div>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="#home" class="text-gray-700 font-medium hover:text-orange-600 transition">Home</a>
                <a href="#features" class="text-gray-700 font-medium hover:text-orange-600 transition">Features</a>
                <a href="#about" class="text-gray-700 font-medium hover:text-orange-600 transition">About</a>
                <a href="index.php" class="btn-primary text-white px-6 py-2 rounded-lg font-semibold">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
            </div>
            
            <button class="md:hidden text-gray-700" onclick="toggleMobileMenu()">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="container mx-auto px-4 py-4 space-y-3">
                <a href="#home" class="block text-gray-700 font-medium py-2 hover:text-orange-600">Home</a>
                <a href="#features" class="block text-gray-700 font-medium py-2 hover:text-orange-600">Features</a>
                <a href="#about" class="block text-gray-700 font-medium py-2 hover:text-orange-600">About</a>
                <a href="index.php" class="block btn-primary text-white px-6 py-2 rounded-lg font-semibold text-center">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Image Slider -->
    <section id="home" class="hero-section relative overflow-hidden bg-black" style="min-height: 600px;">
        <!-- Slider Container -->
        <div class="slider-container relative w-full h-full">
            <!-- Slide 1 -->
            <div class="slide active absolute w-full h-full transition-opacity duration-1000 ease-in-out opacity-100">
                <img src="assets/images/one.jpeg" alt="Setlight Secondary School" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            </div>

            <!-- Slide 2 -->
            <div class="slide absolute w-full h-full transition-opacity duration-1000 ease-in-out opacity-0">
                <img src="assets/images/Two.jpeg" alt="School Campus" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            </div>

            <!-- Slide 3 -->
            <div class="slide absolute w-full h-full transition-opacity duration-1000 ease-in-out opacity-0">
                <img src="assets/images/Three.jpeg" alt="Students & Events" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            </div>

            <!-- Content Overlay -->
            <div class="absolute inset-0 flex items-center justify-center z-10">
                <div class="text-center text-white max-w-3xl px-4">
                    <div class="slide-content active">
                        <h2 class="text-5xl md:text-7xl font-bold mb-4 leading-tight drop-shadow-lg">
                            Setlight Secondary School
                        </h2>
                        <p class="text-xl md:text-2xl mb-8 drop-shadow-lg">
                            Excellence in Education & Technology
                        </p>
                    </div>
                    <div class="slide-content hidden">
                        <h2 class="text-5xl md:text-7xl font-bold mb-4 leading-tight drop-shadow-lg">
                            Smart Class Scheduling
                        </h2>
                        <p class="text-xl md:text-2xl mb-8 drop-shadow-lg">
                            Intelligent Timetable Management for Modern Education
                        </p>
                    </div>
                    <div class="slide-content hidden">
                        <h2 class="text-5xl md:text-7xl font-bold mb-4 leading-tight drop-shadow-lg">
                            Empower Your School
                        </h2>
                        <p class="text-xl md:text-2xl mb-8 drop-shadow-lg">
                            Streamline Operations, Optimize Resources, Enhance Learning
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="index.php" class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-3 rounded-lg font-semibold text-lg transition transform hover:scale-105 drop-shadow-lg">
                            <i class="fas fa-sign-in-alt mr-2"></i>Get Started
                        </a>
                        <button onclick="document.getElementById('features').scrollIntoView({behavior: 'smooth'})" class="border-2 border-white text-white hover:bg-white hover:text-orange-600 px-8 py-3 rounded-lg font-semibold text-lg transition transform hover:scale-105 drop-shadow-lg">
                            <i class="fas fa-chevron-down mr-2"></i>Learn More
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <button onclick="prevSlide()" class="absolute left-4 md:left-8 top-1/2 transform -translate-y-1/2 z-20 bg-white bg-opacity-50 hover:bg-opacity-75 text-black p-3 rounded-full transition">
                <i class="fas fa-chevron-left text-2xl"></i>
            </button>
            <button onclick="nextSlide()" class="absolute right-4 md:right-8 top-1/2 transform -translate-y-1/2 z-20 bg-white bg-opacity-50 hover:bg-opacity-75 text-black p-3 rounded-full transition">
                <i class="fas fa-chevron-right text-2xl"></i>
            </button>

            <!-- Slide Indicators -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 flex gap-3">
                <button onclick="goToSlide(0)" class="slide-indicator active w-3 h-3 rounded-full bg-white transition"></button>
                <button onclick="goToSlide(1)" class="slide-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 transition"></button>
                <button onclick="goToSlide(2)" class="slide-indicator w-3 h-3 rounded-full bg-white bg-opacity-50 transition"></button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 section-title">
                    Key Features
                </h2>
                <p class="text-xl text-gray-600 mt-4 max-w-2xl mx-auto">
                    Everything you need to manage classroom schedules efficiently and effectively
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card bg-white p-8 rounded-2xl">
                    <div class="icon-box">
                        <i class="fas fa-robot"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Automated Scheduling</h3>
                    <p class="text-gray-600 mb-4">
                        Intelligent algorithms automatically generate conflict-free timetables considering all constraints and preferences.
                    </p>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Zero Conflicts</li>
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Fast Generation</li>
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Optimized Distribution</li>
                    </ul>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card bg-white p-8 rounded-2xl">
                    <div class="icon-box">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Smart Notifications</h3>
                    <p class="text-gray-600 mb-4">
                        Automated SMS and in-app notifications keep teachers, students, and parents informed about schedule changes instantly.
                    </p>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Real-time Updates</li>
                        <li><i class="fas fa-check text-green-600 mr-2"></i>SMS Integration</li>
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Multi-channel Delivery</li>
                    </ul>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card bg-white p-8 rounded-2xl">
                    <div class="icon-box">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Analytics & Reports</h3>
                    <p class="text-gray-600 mb-4">
                        Comprehensive reports and analytics provide insights into scheduling efficiency, teacher workload, and resource utilization.
                    </p>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Performance Metrics</li>
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Custom Reports</li>
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Export Options</li>
                    </ul>
                </div>

                <!-- Feature 4 -->
                <div class="feature-card bg-white p-8 rounded-2xl">
                    <div class="icon-box">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Role-Based Access</h3>
                    <p class="text-gray-600 mb-4">
                        Secure authentication system with different access levels for administrators, teachers, and other authorized users.
                    </p>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Secure Login</li>
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Permission Control</li>
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Audit Logs</li>
                    </ul>
                </div>

                <!-- Feature 5 -->
                <div class="feature-card bg-white p-8 rounded-2xl">
                    <div class="icon-box">
                        <i class="fas fa-download"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Multiple Export Formats</h3>
                    <p class="text-gray-600 mb-4">
                        Download timetables in Excel, Word, or PDF formats for easy sharing and printing in your preferred format.
                    </p>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Excel Export</li>
                        <li><i class="fas fa-check text-green-600 mr-2"></i>PDF Generation</li>
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Print Ready</li>
                    </ul>
                </div>

                <!-- Feature 6 -->
                <div class="feature-card bg-white p-8 rounded-2xl">
                    <div class="icon-box">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Offline Access</h3>
                    <p class="text-gray-600 mb-4">
                        Progressive Web App features allow teachers and students to access their timetables even without internet connectivity.
                    </p>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Offline Mode</li>
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Auto-Sync</li>
                        <li><i class="fas fa-check text-green-600 mr-2"></i>Mobile Friendly</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-20 gradient-primary">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="stats-box">
                    <div class="stats-number">100%</div>
                    <p class="text-gray-600 text-lg mt-2">Conflict-Free</p>
                    <p class="text-sm text-gray-500">Automated scheduling</p>
                </div>
                <div class="stats-box">
                    <div class="stats-number" style="color: var(--color-secondary);">50+</div>
                    <p class="text-gray-600 text-lg mt-2">Schools</p>
                    <p class="text-sm text-gray-500">Trust our system</p>
                </div>
                <div class="stats-box">
                    <div class="stats-number" style="color: var(--color-accent);">10K+</div>
                    <p class="text-gray-600 text-lg mt-2">Users</p>
                    <p class="text-sm text-gray-500">Across Uganda</p>
                </div>
                <div class="stats-box">
                    <div class="stats-number" style="color: #0066cc;">99%</div>
                    <p class="text-gray-600 text-lg mt-2">Uptime</p>
                    <p class="text-sm text-gray-500">Reliable service</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About School Section -->
    <section id="about" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-800 section-title mb-6">
                        About Setlight Secondary School
                    </h2>
                    <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                        Setlight Secondary School Buzzi is a premier educational institution located in Wakiso District, Uganda. We are dedicated to providing quality education and developing well-rounded individuals who can contribute positively to society.
                    </p>
                    <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                        With a commitment to academic excellence and the adoption of modern educational technologies, we implemented this classroom scheduling system to enhance our operational efficiency and provide better service to our students, teachers, and parents.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md gradient-primary text-white">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Quality Education</h3>
                                <p class="text-gray-600">Comprehensive curriculum designed to meet international standards</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md gradient-primary text-white">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Experienced Staff</h3>
                                <p class="text-gray-600">Highly qualified teachers committed to student success</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md gradient-primary text-white">
                                    <i class="fas fa-laptop"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">Modern Technology</h3>
                                <p class="text-gray-600">Integration of digital tools to enhance learning and administration</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6">
                    <div class="rounded-2xl overflow-hidden shadow-lg h-64">
                        <img src="assets/images/one.jpeg" alt="School Building" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="rounded-2xl overflow-hidden shadow-lg h-64">
                        <img src="assets/images/Two.jpeg" alt="School Campus" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 gradient-bg">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 section-title">
                    What Users Say
                </h2>
                <p class="text-xl text-gray-600 mt-4 max-w-2xl mx-auto">
                    Hear from administrators, teachers, and parents about their experience
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 mb-4 italic">
                        "This system has transformed how we manage our timetables. What used to take days now takes just minutes. Our teachers and students love it!"
                    </p>
                    <p class="font-semibold text-gray-800">Mr. John Ssemanda</p>
                    <p class="text-sm text-gray-600">School Administrator</p>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 mb-4 italic">
                        "As a teacher, I appreciate the automated scheduling. No more conflicts and I can see my complete schedule instantly. Very user-friendly!"
                    </p>
                    <p class="font-semibold text-gray-800">Ms. Grace Namutebi</p>
                    <p class="text-sm text-gray-600">High School Teacher</p>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 mb-4 italic">
                        "My daughter now receives instant notifications about class changes. We always know where she should be. Excellent system!"
                    </p>
                    <p class="font-semibold text-gray-800">Mr. David Katende</p>
                    <p class="text-sm text-gray-600">Parent</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-6">Ready to Streamline Your School?</h2>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                Join hundreds of schools across Uganda using our intelligent scheduling system. Get started today!
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="index.php" class="btn-primary text-white px-10 py-4 rounded-lg font-semibold text-lg">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login to System
                </a>
                <button onclick="alert('Contact us at: admin@setlightschool.ug')" class="btn-secondary text-white px-10 py-4 rounded-lg font-semibold text-lg">
                    <i class="fas fa-envelope mr-2"></i>Contact Support
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-16 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div>
                    <h3 class="text-2xl font-bold text-white mb-4">
                        <i class="fas fa-chalkboard-teacher text-orange-600"></i> <?php echo APP_NAME; ?>
                    </h3>
                    <p class="text-gray-400 mb-4">
                        Intelligent classroom scheduling system for Uganda's secondary schools.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-orange-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange-600 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange-600 transition">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="footer-link">Home</a></li>
                        <li><a href="#features" class="footer-link">Features</a></li>
                        <li><a href="#about" class="footer-link">About</a></li>
                        <li><a href="index.php" class="footer-link">Login</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4">Resources</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="footer-link">Documentation</a></li>
                        <li><a href="#" class="footer-link">Support</a></li>
                        <li><a href="#" class="footer-link">FAQ</a></li>
                        <li><a href="#" class="footer-link">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-4">Contact Info</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-map-marker-alt mr-2 text-orange-600"></i>Wakiso District, Uganda</li>
                        <li><i class="fas fa-phone mr-2 text-orange-600"></i>0772 439 722</li>
                        <li><i class="fas fa-envelope mr-2 text-orange-600"></i>admin@setlight.ug</li>
                        <li><i class="fas fa-clock mr-2 text-orange-600"></i>Mon - Fri: 8:00 - 17:00</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; <?php echo date('Y'); ?> Setlight Secondary School Buzzi. All rights reserved.</p>
                <p class="mt-2 text-sm">
                    <a href="#" class="footer-link">Privacy Policy</a> | 
                    <a href="#" class="footer-link">Terms of Service</a> | 
                    <a href="#" class="footer-link">Cookie Policy</a>
                </p>
            </div>
        </div>
    </footer>

    <script>
        let currentSlide = 0;
        let autoSlideInterval;

        function showSlide(n) {
            const slides = document.querySelectorAll('.slide');
            const contents = document.querySelectorAll('.slide-content');
            const indicators = document.querySelectorAll('.slide-indicator');

            if (n >= slides.length) currentSlide = 0;
            if (n < 0) currentSlide = slides.length - 1;

            // Hide all slides
            slides.forEach(slide => {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
            });

            // Hide all contents
            contents.forEach(content => {
                content.classList.add('hidden');
            });

            // Remove active indicator styling
            indicators.forEach(indicator => {
                indicator.classList.remove('bg-opacity-100');
                indicator.classList.add('bg-opacity-50');
            });

            // Show current slide and content
            slides[currentSlide].classList.remove('opacity-0');
            slides[currentSlide].classList.add('opacity-100');
            contents[currentSlide].classList.remove('hidden');
            indicators[currentSlide].classList.remove('bg-opacity-50');
            indicators[currentSlide].classList.add('bg-opacity-100');
        }

        function nextSlide() {
            currentSlide++;
            showSlide(currentSlide);
            resetAutoSlide();
        }

        function prevSlide() {
            currentSlide--;
            showSlide(currentSlide);
            resetAutoSlide();
        }

        function goToSlide(n) {
            currentSlide = n;
            showSlide(currentSlide);
            resetAutoSlide();
        }

        function autoSlide() {
            currentSlide++;
            showSlide(currentSlide);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            autoSlideInterval = setInterval(autoSlide, 5000); // Change slide every 5 seconds
        }

        // Initialize slider
        showSlide(currentSlide);
        autoSlideInterval = setInterval(autoSlide, 5000);

        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Smooth scroll behavior for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                        // Close mobile menu if open
                        document.getElementById('mobileMenu').classList.add('hidden');
                    }
                }
            });
        });

        // Add scroll animation to feature cards
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.feature-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>
