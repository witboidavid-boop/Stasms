# Quick Start Guide - Uganda Classroom Scheduling System

## For Administrators

### First Time Setup (5 minutes)

1. **Login**
   - URL: http://localhost/stasms/
   - Username: `admin`
   - Password: `admin123`
   - **Change password immediately!**

2. **Add Classrooms**
   - Go to: Admin Dashboard → Manage Classrooms
   - Click "Add Classroom"
   - Fill in: Name, Capacity, Type (Regular/Lab/Hall)
   - Save

3. **Add Teachers**
   - Go to: Admin Dashboard → Manage Teachers
   - Click "Add Teacher"
   - Fill in: Name, Phone, Subjects, Max Periods/Day
   - Save

4. **Add Subjects** (if needed)
   - Go to: Admin Dashboard → Manage Subjects
   - Click "Add Subject"
   - Fill in: Name, UNEB Code, Room Type, Double Period flag
   - Save

5. **Generate Timetable**
   - Go to: Admin Dashboard → Generate Timetable
   - Select: Stream (e.g., Form 1A), Term, Academic Year
   - Click "Generate"
   - Review conflicts (if any)
   - Timetable is automatically saved

### Daily Tasks

- **View Conflicts**: Dashboard shows scheduling conflicts
- **Send Notifications**: Use notification system to alert teachers
- **Generate Reports**: View room utilization and teacher workload

## For Teachers

### First Time Login

1. **Login**
   - URL: http://localhost/stasms/
   - Username: Provided by administrator
   - Password: Provided by administrator

2. **View Schedule**
   - Dashboard shows today's classes
   - "My Timetable" shows full weekly schedule
   - Schedule updates automatically

3. **Print Schedule**
   - Go to: My Timetable → Print button
   - Or: Print Schedule page
   - Print-friendly format

4. **Check Notifications**
   - Bell icon shows unread count
   - Click to view timetable changes
   - SMS notifications (if configured)

### Offline Access

- **Download Schedule**: Click "Download" on timetable page
- **View Offline**: Schedule cached in browser
- **Auto-Sync**: Changes sync when internet returns

## Common Tasks

### Admin: Add a New Teacher

1. Admin Dashboard → Manage Teachers
2. Click "Add Teacher"
3. Enter details:
   - Name: "Mr. John Kato"
   - Phone: "+256700123456"
   - Subjects: Select Mathematics, Physics
   - Max Periods/Day: 5
   - Preferred Time: Morning
4. Click "Save"

### Admin: Generate Timetable for Form 1A

1. Admin Dashboard → Generate Timetable
2. Select:
   - Stream: Form 1A
   - Term: 1
   - Academic Year: 2024/2025
3. Click "Generate"
4. Wait for completion
5. Review timetable
6. Check for conflicts (red highlights)

### Teacher: Print My Schedule

1. Login as teacher
2. Go to: My Timetable
3. Click "Print" button
4. Browser print dialog opens
5. Select printer or "Save as PDF"
6. Print

## Keyboard Shortcuts

- `Ctrl + P`: Print current page
- `F5`: Refresh page
- `Esc`: Close modals

## Tips

### For Better Performance
- Clear browser cache monthly
- Backup database weekly
- Keep browser updated

### For Offline Use
- Download timetable when online
- Schedule cached automatically
- Works without internet

### For Printing
- Use Chrome or Edge for best results
- Print in landscape for timetables
- Black & white prints faster

## Troubleshooting

### Can't Login
- Check username/password
- Clear browser cookies
- Try different browser

### Timetable Not Showing
- Check stream is selected
- Verify term and year
- Generate timetable first

### Offline Not Working
- Must use localhost or HTTPS
- Check browser supports Service Workers
- Clear browser cache

## Support

For help:
1. Check README.md for detailed info
2. Review INSTALLATION.md for setup
3. Check browser console for errors
4. Contact system administrator

---

**Welcome to the Uganda Classroom Scheduling System!**
