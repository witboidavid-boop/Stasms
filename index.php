<?php
/**
 * Login Page - Setlight Secondary School Buzzi
 * Uganda-appropriate authentication system
 */

require_once 'includes/config.php';
require_once 'includes/auth.php';

$auth = getAuth();
$error = '';
$success = '';

// Redirect if already logged in
if ($auth->isLoggedIn()) {
    $user = $auth->getCurrentUser();
    if ($user['role'] === 'admin') {
        redirect('admin/dashboard.php');
    } else {
        redirect('teacher/dashboard.php');
    }
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'login') {
        $username = sanitize($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        
        if (empty($username) || empty($password)) {
            $error = 'Please enter both username and password';
        } else {
            $result = $auth->login($username, $password);
            if ($result['success']) {
                $user = $result['user'];
                if ($user['role'] === 'admin') {
                    redirect('admin/dashboard.php');
                } else {
                    redirect('teacher/dashboard.php');
                }
            } else {
                $error = $result['message'];
            }
        }
    }
}

function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?php echo APP_NAME; ?></title>
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
            background: linear-gradient(135deg, #FFF9E6 0%, #FFE6CC 100%);
            background-image: url('assets/images/Three.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            position: relative;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.5) 0%, rgba(255, 153, 0, 0.3) 100%);
            pointer-events: none;
            z-index: 0;
        }
        .btn-primary {
            background-color: var(--color-primary);
        }
        .btn-primary:hover {
            background-color: #E68900;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <!-- Back to Home Link -->
    <div class="absolute top-4 left-4 z-50">
        <a href="home.php" class="text-white hover:text-orange-300 font-medium flex items-center gap-2 transition drop-shadow-lg">
            <i class="fas fa-arrow-left"></i>Back to Home
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md relative z-10">
        <div class="text-center mb-8">
            <div class="inline-block p-4 bg-orange-100 rounded-full mb-4">
                <i class="fas fa-chalkboard-teacher text-orange-600 text-4xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800"><?php echo APP_NAME; ?></h1>
            <p class="text-gray-600 mt-2"><?php echo APP_TITLE; ?></p>
            <p class="text-sm text-gray-500 mt-1">Wakiso District, Uganda</p>
        </div>

        <?php if ($error): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span><?php echo $error; ?></span>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span><?php echo $success; ?></span>
                </div>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="space-y-6">
            <input type="hidden" name="action" value="login">
            
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-user mr-2"></i>Username
                </label>
                <input type="text" 
                       id="username" 
                       name="username" 
                       required
                       autocomplete="username"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent text-lg"
                       placeholder="Enter your username">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-lock mr-2"></i>Password
                </label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       required
                       autocomplete="current-password"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-transparent text-lg"
                       placeholder="Enter your password">
            </div>

            <button type="submit" 
                    class="w-full bg-orange-600 hover:bg-orange-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 text-lg shadow-md">
                <i class="fas fa-sign-in-alt mr-2"></i>Login
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="#" onclick="showPasswordRecovery()" class="text-sm text-orange-600 hover:text-orange-700">
                <i class="fas fa-key mr-1"></i>Forgot Password?
            </a>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200 text-center text-sm text-gray-500">
            <p>Default Login: admin / admin123</p>
        </div>
    </div>

    <!-- Password Recovery Modal -->
    <div id="recoveryModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-xl shadow-xl p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Password Recovery</h2>
            <form id="recoveryForm" method="POST" action="api/recover_password.php" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                    <input type="text" name="username" required class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Security Question</label>
                    <input type="text" id="security_question" readonly class="w-full px-4 py-2 border rounded-lg bg-gray-100">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Security Answer</label>
                    <input type="text" name="security_answer" required class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                    <input type="password" name="new_password" required class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div class="flex gap-3">
                    <button type="submit" class="flex-1 bg-orange-600 text-white py-2 rounded-lg">Reset Password</button>
                    <button type="button" onclick="hidePasswordRecovery()" class="flex-1 bg-gray-300 text-gray-700 py-2 rounded-lg">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showPasswordRecovery() {
            document.getElementById('recoveryModal').classList.remove('hidden');
        }

        function hidePasswordRecovery() {
            document.getElementById('recoveryModal').classList.add('hidden');
        }

        // Get security question when username is entered
        document.querySelector('#recoveryForm input[name="username"]')?.addEventListener('blur', async function() {
            const username = this.value;
            if (username) {
                try {
                    const response = await fetch('api/get_security_question.php', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify({username: username})
                    });
                    const data = await response.json();
                    if (data.success) {
                        document.getElementById('security_question').value = data.question || 'No security question set';
                    }
                } catch (e) {
                    console.error('Error fetching security question:', e);
                }
            }
        });
    </script>
</body>
</html>
