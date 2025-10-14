# Celebrations – Event Management System

## Overview of the Project
Celebrations is a responsive and user-friendly Event Management System built using Laravel 12 and the Blade templating engine.
It simplifies the process of planning, organizing, and booking events such as weddings, birthdays, and corporate functions.

The platform provides both public-facing pages and an admin dashboard for event organizers, offering an integrated solution for viewing, managing, and booking event services.

---
## Problem Statement

Planning events like weddings, birthdays, and corporate functions is often stressful and time-consuming.
Users struggle to find reliable services, view past events for inspiration, and manage bookings in one place.
There is a need for a user-friendly platform that simplifies event planning, showcases past events, and allows seamless booking and feedback.

## Proposed Solution

The Celebrations Event Management System provides a centralized and user-friendly platform for planning and booking events.
Users can browse and book services for various event types, view past event galleries for inspiration, and provide feedback on services.

The platform also includes secure user registration and login, ensuring a personalized experience.
By integrating all features into one place, it reduces the stress of event planning and enhances transparency and user satisfaction.

## Objective

Design a responsive, professional, and user-friendly interface using Laravel 12 and Blade templates.
The project demonstrates modular and reusable UI components such as headers, footers, and navigation menus while ensuring consistent design across all pages.

## Technologies / Frameworks Used
- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript  
- **Backend:** Laravel (PHP Framework)  
- **Templating Engine:** Blade  
- **Version Control:** Git & GitHub  
- **Tools:** PhpStorm, Composer, XAMPP / Laravel Artisan  

---

## Screenshots of Pages

| Page | Screenshot |
|------|-------------|
| Home Page | ![Home Page](https://github.com/user-attachments/assets/329a05f0-fd43-4129-90b9-52f80a36d126) |
| About Us | ![About Us](https://github.com/user-attachments/assets/d3f4f560-e157-4a21-bf0a-34a7fe28b4fc) |
| Gallery | ![Gallery](https://github.com/user-attachments/assets/3daf9991-4f8e-4867-b081-36c08a83a615) |
| Services | <img width="1916" height="954" alt="image" src="https://github.com/user-attachments/assets/c3c881ab-9f79-4cc9-8317-548e9865076b" />
| Login (Users) | ![Login Page - Users](https://github.com/user-attachments/assets/a71e5964-55e9-45c9-b5ac-1bd0bb214c1f) |
| Login (Admin) | ![Login Page - Admin](https://github.com/user-attachments/assets/6bd61108-31d1-4129-9da8-f4b6cddc6b68) |
| Admin Dashboard | <img width="1920" height="966" alt="Screenshot (42)" src="https://github.com/user-attachments/assets/cd8b61e8-6718-421f-98b4-91fc554e6bfc" /> |
| Register (Users/Admin) | ![Registration Page](https://github.com/user-attachments/assets/73942ccf-2f87-466f-8d57-5a7dab3f9b77) |
| Contact Us | ![Contact Us](https://github.com/user-attachments/assets/842ad00b-ede1-4769-b5a1-0ad71b51f29b) |
| Book | <img width="1896" height="947" alt="image" src="https://github.com/user-attachments/assets/396dec73-d7d3-4fe9-a282-adc54c149831" /> |
| Feedback | ![Feedback](https://github.com/user-attachments/assets/4254892f-927c-464f-9663-f593d3f8fdbb) |

---

## List of All Image Sources Used

- [Unsplash](https://unsplash.com) – for event and decoration photos  
- [Pexels](https://pexels.com) – for background and celebration images    
- [Flaticon](https://www.flaticon.com) – for small event icons  

---

## Setup Instructions

Follow these steps to set up the project locally:

1. **Clone the repository**
   ```bash
   https://github.com/2025-Fall-ITE-5330-RNA/project-phases-techcore
2. **Navigate to the project folder**
   ```bash
   cd project-phases-techcore

3. **Install dependencies**
   ```bash
   composer install

4. **Create environment file**
   ```bash
   cp .env.example .env

5. **Generate application key**
   ```bash
   php artisan key:generate

6. **Run migrations**
   ```bash
   php artisan migrate
6. **Serve the application**
   ```bash
   php artisan serve
   
**The project will be available at: http://localhost:8000**
