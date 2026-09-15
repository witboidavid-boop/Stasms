# Installation Guide - Uganda Classroom Scheduling System

## Quick Start (5 Minutes)

### 1. Install XAMPP
- Download from: https://www.apachefriends.org/
- Install to default location: `C:\xampp`
- Start Apache and MySQL from XAMPP Control Panel

### 2. Setup Database
1. Open: http://localhost/phpmyadmin
2. Click "New" to create database
3. Name: `stasms_db`
4. Click "Create"
5. Click "Import" tab
6. Select file: `database/schema.sql`
7. Click "Go"

### 3. Configure Application
1. Copy project to: `C:\xampp\htdocs\stasms`
2. Edit `includes/config.php`:
   - Set `DB_PASS` to empty string `''` (XAMPP default)
   - Set `BASE_URL` to `'http://localhost/stasms/'`

### 4. Login
- URL: http://localhost/stasms/
- Username: `admin`
- Password: `admin123`

**Change password immediately after first login!**

## Detailed Installation

### System Requirements
- Windows 10/11 (or Linux/Mac)
- XAMPP 7.4+ (includes PHP 7.4+ and MySQL)
- Modern web browser
- 100MB free disk space

### Step-by-Step Instructions

#### Step 1: Install XAMPP
1. Download XAMPP installer
2. Run installer as Administrator
3. Select components: Apache, MySQL, PHP, phpMyAdmin
4. Install to `C:\xampp` (recommended)
5. Start XAMPP Control Panel
6. Start Apache and MySQL services

#### Step 2: Create Database
1. Open browser: http://localhost/phpmyadmin
2. Click "New" in left sidebar
3. Database name: `stasms_db`
4. Collation: `utf8mb4_unicode_ci`
5. Click "Create"
6. Select `stasms_db` database
7. Click "Import" tab
8. Choose file: `database/schema.sql`
9. Click "Go" button
10. Wait for "Import has been successfully finished" message

#### Step 3: Install Application
1. Copy entire `stasms` folder to `C:\xampp\htdocs\`
2. Full path should be: `C:\xampp\htdocs\stasms\`
3. Create folders if missing:
   - `temp/`
   - `backups/`
   - `assets/images/`

#### Step 4: Configure Database Connection
1. Open file: `includes/config.php`
2. Find these lines:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'stasms_db');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   ```
3. If MySQL password is set, update `DB_PASS`
4. Save file

#### Step 5: Test Installation
1. Open browser: http://localhost/stasms/
2. You should see login page
3. Login with:
   - Username: `admin`
   - Password: `admin123`
4. If login successful, installation is complete!

## Post-Installation

### Change Default Password
1. Login as admin
2. Go to Admin Dashboard
3. (Password change feature can be added)

### Add Sample Data (Optional)
The database schema includes:
- Default admin user
- Sample streams (Forms 1-6, A/B/C)
- UNEB subjects (Mathematics, Physics, Chemistry, etc.)
- Timetable slots (Monday-Saturday, Periods 1-8)

### Configure SMS (Optional)
1. Sign up at https://africastalking.com/
2. Get API credentials
3. Edit `includes/config.php`:
   ```php
   define('AT_API_KEY', 'your_key');
   define('AT_USERNAME', 'your_username');
   ```

## Troubleshooting

### "Database connection failed"
- Check MySQL is running in XAMPP
- Verify database name is `stasms_db`
- Check `includes/config.php` credentials
- Try: http://localhost/phpmyadmin

### "404 Not Found"
- Verify folder is in `C:\xampp\htdocs\stasms\`
- Check Apache is running
- Try: http://localhost/stasms/index.php

### "Session error"
- Check `temp/` folder exists
- Ensure folder is writable
- Clear browser cookies

### "Service Worker not working"
- Must use localhost or HTTPS
- Check browser console for errors
- Try different browser

## Verification Checklist

- [ ] XAMPP installed and running
- [ ] Database `stasms_db` created
- [ ] Schema imported successfully
- [ ] Application files in `htdocs/stasms/`
- [ ] Can access http://localhost/stasms/
- [ ] Login page displays correctly
- [ ] Can login with admin/admin123
- [ ] Admin dashboard loads
- [ ] No PHP errors in browser

## Next Steps

1. **Add Teachers**: Admin → Manage Teachers
2. **Add Classrooms**: Admin → Manage Classrooms
3. **Configure Streams**: Admin → Manage Streams
4. **Generate Timetable**: Admin → Generate Timetable

## Support

If installation fails:
1. Check XAMPP error logs: `C:\xampp\apache\logs\error.log`
2. Check PHP error logs: `C:\xampp\php\logs\php_error_log`
3. Verify all requirements are met
4. Try reinstalling XAMPP

---

**Installation complete! Welcome to the Uganda Classroom Scheduling System.**
