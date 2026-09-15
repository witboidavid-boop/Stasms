# Ugandan Secondary School Classroom Scheduling System

A robust, beautiful, and resilient classroom scheduling system designed specifically for Setlight Secondary School Buzzi, Wakiso District, Uganda. Built to work reliably despite power outages, low internet connectivity, and basic computer literacy among staff.

## Features

### Core Functionality
- **Triple Stream System**: Supports Form 1A, 1B, 1C (and Forms 2-6)
- **Automated Timetable Generation**: Intelligent scheduling algorithm with conflict detection
- **Offline-First Design**: Works without internet using Service Workers and IndexedDB
- **Mobile-First UI**: Optimized for smartphones with high contrast for bright sunlight
- **Uganda Color Theme**: Orange (#FF9900), Green (#009933), Red (#CC0000)
- **SMS Integration**: Africa's Talking API for timetable change notifications
- **Print-Optimized**: Clean black-and-white timetable printing

### User Roles
- **Admin**: Full control over classrooms, teachers, subjects, streams, and timetable generation
- **Teacher**: View personal timetable, receive notifications, print schedule

### Resilience Features
- Auto-save every 5 minutes
- Offline sync queue for pending changes
- Session recovery after unexpected logout
- Database transaction rollback on failure
- Local browser caching (localStorage + IndexedDB)

## Requirements

- PHP 7.4 or higher
- MySQL 5.7+ or MariaDB 10.3+
- Apache web server
- XAMPP (recommended for Windows) or WAMP/LAMP
- Modern web browser (Chrome, Firefox, Edge, Safari)

## Installation

### Step 1: Install XAMPP

1. Download XAMPP from https://www.apachefriends.org/
2. Install XAMPP to `C:\xampp` (default location)
3. Start Apache and MySQL from XAMPP Control Panel

### Step 2: Setup Database

1. Open phpMyAdmin: http://localhost/phpmyadmin
2. Create a new database named `stasms_db`
3. Import the schema file:
   - Click on `stasms_db` database
   - Go to "Import" tab
   - Choose file: `database/schema.sql`
   - Click "Go"

### Step 3: Configure Application

1. Copy the entire project folder to `C:\xampp\htdocs\stasms`
2. Edit `includes/config.php`:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'stasms_db');
   define('DB_USER', 'root');
   define('DB_PASS', ''); // Leave empty for XAMPP default
   ```

3. Update `BASE_URL` in `includes/config.php`:
   ```php
   define('BASE_URL', 'http://localhost/stasms/');
   ```

### Step 4: Create Required Directories

Create these directories if they don't exist:
- `temp/` - For queued changes during outages
- `backups/` - For database backups
- `assets/images/` - For school logo (optional)

### Step 5: Set Permissions

Ensure these directories are writable:
- `temp/`
- `backups/`

### Step 6: Access the Application

1. Open browser: http://localhost/stasms/
2. Default login credentials:
   - Username: `admin`
   - Password: `admin123`

**Important**: Change the default password immediately after first login!

## SMS Configuration (Optional)

To enable SMS notifications via Africa's Talking:

1. Sign up at https://africastalking.com/
2. Get your API key and username
3. Edit `includes/config.php`:
   ```php
   define('AT_API_KEY', 'your_api_key_here');
   define('AT_USERNAME', 'your_username_here');
   define('AT_SENDER_ID', 'SETLIGHT');
   ```

## Usage Guide

### For Administrators

1. **Manage Classrooms**: Add/edit/delete classrooms with capacity and type
2. **Manage Teachers**: Add teachers, assign subjects, set preferences
3. **Manage Subjects**: Add UNEB curriculum subjects with room requirements
4. **Manage Streams**: Configure Form streams (A/B/C for each form level)
5. **Generate Timetable**: Automated scheduling with conflict detection
6. **View Reports**: Room utilization and teacher workload analytics

### For Teachers

1. **Dashboard**: View today's schedule at a glance
2. **My Timetable**: Full weekly schedule view
3. **Notifications**: Receive timetable change alerts
4. **Print Schedule**: Download or print personal timetable

## File Structure

```
stasms/
├── admin/              # Admin pages
│   ├── dashboard.php
│   ├── manage_classrooms.php
│   ├── manage_teachers.php
│   ├── manage_subjects.php
│   ├── manage_streams.php
│   ├── generate_timetable.php
│   └── reports.php
├── teacher/            # Teacher pages
│   ├── dashboard.php
│   ├── my_timetable.php
│   ├── notifications.php
│   └── print_schedule.php
├── api/                # API endpoints
│   ├── get_timetable.php
│   ├── save_changes.php
│   ├── sync_offline.php
│   └── logout.php
├── includes/           # Core PHP files
│   ├── config.php
│   ├── database.php
│   ├── auth.php
│   ├── functions.php
│   ├── sms_handler.php
│   └── navbar.php
├── assets/            # Frontend assets
│   ├── css/
│   ├── js/
│   └── images/
├── database/          # Database schema
│   └── schema.sql
├── temp/              # Temporary files
├── backups/           # Database backups
└── index.php          # Login page
```

## Troubleshooting

### Database Connection Error
- Check MySQL is running in XAMPP Control Panel
- Verify database credentials in `includes/config.php`
- Ensure database `stasms_db` exists

### Session Issues
- Check `php.ini` session settings
- Ensure `temp/` directory is writable
- Clear browser cookies and try again

### Offline Features Not Working
- Ensure HTTPS or localhost (required for Service Workers)
- Check browser console for errors
- Verify `service-worker.js` is accessible

### SMS Not Sending
- Verify Africa's Talking API credentials
- Check account balance
- Review error logs in `includes/sms_handler.php`

## Backup & Restore

### Backup Database
1. Open phpMyAdmin
2. Select `stasms_db` database
3. Click "Export" tab
4. Choose "Quick" method
5. Click "Go" to download SQL file

### Restore Database
1. Open phpMyAdmin
2. Select `stasms_db` database
3. Click "Import" tab
4. Choose backup SQL file
5. Click "Go"

## Security Notes

- Change default admin password immediately
- Use strong passwords for all users
- Regularly backup database
- Keep PHP and MySQL updated
- Use HTTPS in production (if possible)

## Support

For issues or questions:
1. Check troubleshooting section above
2. Review error logs in browser console
3. Check PHP error logs in XAMPP

## License

This project is developed for Setlight Secondary School Buzzi, Wakiso District, Uganda.

## Credits

Developed with consideration for:
- Uganda National Examinations Board (UNEB) curriculum requirements
- Ugandan secondary school structure (triple streams, 3-term system)
- Real-world challenges (power outages, low internet, basic computer literacy)

---

**Built with resilience in mind for Ugandan schools.**
