# Elimu Library Clone

A lightweight, database-free clone of the Elimu Library educational resources platform, designed for self-hosting on ordinary cPanel shared hosting with PHP 8.1+.

## Features

- **Database-free**: Uses CSV files for data storage
- **Hierarchical Categories**: Smart navigation through education levels and grades
- **Admin Panel**: Complete content management system
- **Payment Integration**: Mpesa Till payment stub
- **Responsive Design**: Mobile-first approach with CSS Grid/Flexbox
- **Search Functionality**: Full-text search across documents
- **Analytics**: Download tracking and statistics
- **File Management**: Upload and organize educational resources

## Requirements

- PHP 8.1 or higher
- Apache web server
- cPanel shared hosting (or similar)
- No database required
- No Composer dependencies

## Installation

### 1. Upload Files

1. Download the `elimulibrary-clone.zip` file
2. Extract the contents
3. Upload all files to your web hosting directory (usually `public_html`)

### 2. Set Permissions

Set the following directories to writable (755 or 777):
- `/data/`
- `/docs/`
- `/cache/`

### 3. Access the Site

- **Frontend**: Visit your domain (e.g., `https://yourdomain.com`)
- **Admin Panel**: Visit `https://yourdomain.com/admin/`
- **Login Credentials**: 
  - Username: `admin`
  - Password: `admin123`

## File Structure

\`\`\`
/
├── index.php                 # Homepage
├── category.php             # Category browsing
├── item.php                 # Document details
├── search.php               # Search functionality
├── popular.php              # Popular documents
├── download.php             # File download handler
├── about.php                # About page
├── contact.php              # Contact page
├── policy.php               # Privacy policy
├── 404.php                  # Error page
├── includes/
│   ├── config.php           # Site configuration
│   ├── functions.php        # Core functions
│   ├── header.php           # Site header
│   └── footer.php           # Site footer
├── admin/
│   ├── index.php            # Admin dashboard
│   ├── login.php            # Admin login
│   ├── upload.php           # File upload
│   ├── documents.php        # Document management
│   ├── categories.php       # Category management
│   ├── analytics.php        # Analytics dashboard
│   └── logout.php           # Logout handler
├── assets/
│   ├── style.css            # Main stylesheet
│   ├── admin.css            # Admin panel styles
│   └── main.js              # JavaScript functions
├── data/
│   ├── categories.csv       # Category data
│   └── documents.csv        # Document data
├── docs/                    # Uploaded documents
├── cache/                   # Cache files
└── README.md               # This file
\`\`\`

## Usage

### For Administrators

1. **Login**: Access `/admin/` and login with admin credentials
2. **Upload Documents**: Use the upload form to add new educational resources
3. **Manage Categories**: Organize content by education level and grade
4. **View Analytics**: Monitor downloads and popular content
5. **Edit/Delete**: Manage existing documents and categories

### For Users

1. **Browse Categories**: Click on category cards to explore content
2. **Search**: Use the search bar to find specific resources
3. **View Documents**: Click on document titles to see details
4. **Download**: Pay via Mpesa and download files

## Customization

### Site Configuration

Edit `includes/config.php` to customize:
- Site name and contact information
- Mpesa Till number
- Admin credentials
- File upload limits

### Styling

Edit `assets/style.css` to customize:
- Colors and typography
- Layout and spacing
- Responsive breakpoints

### Categories

The hierarchical category system supports:
- Main categories (Primary, Secondary, JSS, etc.)
- Education levels (Lower Primary, Upper Primary, etc.)
- Grade levels (Grade 1-12, Form 1-4)
- Terms (Term 1-3)

## Payment Integration

The system includes a payment stub for Mpesa integration:
1. Users click download
2. Payment modal shows Mpesa Till number
3. Users pay via Mpesa
4. Users click "Mark as Paid" to download

**Note**: This is a demo implementation. For production use, integrate with actual Mpesa API for payment verification.

## Security Features

- CSRF protection on forms
- File upload validation
- Input sanitization
- Session-based admin authentication
- Secure file serving

## Performance

- CSV caching system (10-minute TTL)
- Optimized CSS and JavaScript
- Responsive images
- Minimal HTTP requests

## Browser Support

- Chrome 60+
- Firefox 60+
- Safari 12+
- Edge 79+
- Mobile browsers

## Troubleshooting

### Common Issues

1. **Permission Errors**: Ensure `/data/`, `/docs/`, and `/cache/` directories are writable
2. **Upload Failures**: Check PHP upload limits in cPanel
3. **Cache Issues**: Delete files in `/cache/` directory
4. **Admin Access**: Use default credentials: admin/admin123

### File Upload Limits

If you need to upload larger files:
1. Increase PHP upload limits in cPanel
2. Modify the limit in `includes/functions.php`
3. Adjust server timeout settings

## Support

For technical support:
1. Check the troubleshooting section
2. Verify file permissions
3. Check PHP error logs in cPanel
4. Ensure PHP 8.1+ is enabled

## License

This project is open source and available under the MIT License.

## Credits

- Built with vanilla PHP, CSS, and JavaScript
- Icons from Lucide (embedded as SVG)
- Fonts from Google Fonts (Inter)
- Inspired by Elimu Library Kenya

---

**Note**: This is a demonstration clone for educational purposes. For production use, consider implementing proper payment verification, user authentication, and additional security measures.
