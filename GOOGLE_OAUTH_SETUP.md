# Google OAuth Setup Guide

## Setup Instructions

### 1. Google Cloud Console Configuration
1. Buka [Google Cloud Console](https://console.cloud.google.com/)
2. Buat project baru atau pilih project yang sudah ada
3. Enable Google+ API dan Google OAuth2 API
4. Buat OAuth2 Credentials:
   - Pergi ke "Credentials" → "Create Credentials" → "OAuth client ID"
   - Pilih "Web application"
   - Tambahkan Authorized redirect URIs:
     - `http://localhost/auth/google/callback` (untuk development)
     - `https://yourdomain.com/auth/google/callback` (untuk production)

### 2. Update Environment Variables
Buka file `.env` dan update dengan credentials dari Google:

```env
# Google OAuth Configuration
GOOGLE_CLIENT_ID=your_actual_google_client_id_here
GOOGLE_CLIENT_SECRET=your_actual_google_client_secret_here
GOOGLE_REDIRECT_URI=http://localhost/auth/google/callback
```

### 3. Run Database Migration
```bash
php artisan migrate
```

### 4. Clear Application Cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
```

## Features Implemented

### Backend Features:
- ✅ Laravel Socialite integration
- ✅ Google OAuth2 flow
- ✅ User creation/login from Google data
- ✅ Avatar storage from Google profile
- ✅ Automatic email verification
- ✅ Error handling for OAuth failures

### Frontend Features:
- ✅ Google login button with loading state
- ✅ Google register button with loading state
- ✅ Seamless integration with existing login/register forms

## How It Works

1. **Login Flow:**
   - User clicks "Login with Google"
   - Redirected to Google OAuth consent screen
   - User authorizes the application
   - Redirected back with OAuth code
   - Exchange code for access token
   - Retrieve user information from Google
   - Find existing user or create new one
   - Log user in and redirect to dashboard

2. **Registration Flow:**
   - Same as login flow
   - If user doesn't exist, creates complete profile with:
     - Email from Google
     - First name and last name from Google profile
     - Avatar from Google profile picture
     - Auto-verified email status

## Database Schema

Additional fields added to `users` table:
- `google_id` - Unique Google user ID
- `avatar` - Profile picture URL from Google
- `upline_code` - Referral system support
- `email_verified_at` - Auto-set for Google users
- `is_verified` - Auto-set to true for Google users

## Error Handling

- OAuth failures redirect to login page with error message
- Invalid credentials are handled gracefully
- Network errors during OAuth are caught and reported

## Security Features

- CSRF protection enabled
- Secure token storage
- Session management
- Password auto-generation for Google users
- Automatic email verification

## Testing

1. Update `.env` with actual Google credentials
2. Run migrations
3. Test login flow
4. Test registration flow
5. Verify user data is correctly saved
6. Test error scenarios

## Production Considerations

1. Update Google Console with production domain
2. Set proper environment variables in production
3. Configure HTTPS (required for OAuth)
4. Set up proper error logging
5. Consider adding email verification confirmation