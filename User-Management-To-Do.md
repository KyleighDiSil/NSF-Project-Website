# Login Page:
- ~~(Style) Layout of forgot password and create account button~~
- ~~(Style) Add hover effects on the submit button~~
- ~~(Style) Can we make it so there is no scrolling (fill whole page)? This way we can see the header, content, and footer without scrolling.~~
- (Style) How do we indicated invalid account details? (Pop up msg, error banner, red outlines, other?)
- (Style) Show/hide password icons not loading when internet is disconnected. Can we cache the icon library or have another default icon when there is no internet?
- (javascript) Move showPassword to a javascript file for reuse in the create account page
- (Php-backend) Better error checking and input checking
- (Php-backend) Format and comment login.php script for better code review
- (Php-backend) Implement some functionality for the forgot password button
    - (Php-backend) Can use simple send_mail php function to send a reset link to the user.

# Create Account Page:
- (style) Can we make this form any prettier? Maybe add a more interesting background such as a gradient?
- (Style) Add hover effects on the submit button
- (Style) Add select effects for outlines and maybe a tooltip for allowed inputs
- (Style) How should we do validation? (Live as the user types things in, onsubmit, a bit of both?)
    - (Style) How do we indicated invalid account details? (Pop up msg, error banner, red outlines, other?)
- (Style) Center submit button text
- (Php-backend) Better error checking and input checking
- (Php-backend) Format and comment create_account.php script for better code review

# Account Management Page:
- (Style) This page needs a lot of work. We should theme this like the login/create account pages
- (Php-backend) Get user_management table working!
    - Should this allow "admin" users to edit/view personal information aside from access level
- (Php-backend) Get password changing working!
- (Style) Add hover effects on the submit buttons
- (Style) Add select effects for outlines and maybe a tooltip for allowed inputs
- (Style) How should we do validation? (Live as the user types things in, onsubmit, a bit of both?)
    - (Style) How do we indicated invalid account details? (Pop up msg, error banner, red outlines, other?)

# General:
- (Php-backend) Can we add a timeout so after some time the user is logged out automatically?
- (Php-backend) Format and comment get_access.php script for better code review
- (git-server) Get a simple authentication demo working
    - Using gitea's api, we can add/remove users.
    - For now we will have the users prompted to create a separate password on login to gitea.
    - Using out salt/encryption scheme can't be used securely without exposing password details to the server or exposing the gitea api to the client. Both should be avoided.