<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# 💼 Job Portal (Laravel 11)

A modern Job Listing and Management web application built with **Laravel**, **Blade**, and **Tailwind CSS**.  
Employers can post, edit, and delete job listings, while users can browse and apply to open positions.  

---

## 🚀 Features

### 👨‍💼 Employer Features
- Create, edit, and delete job listings.
- Each employer is linked to a user account.
- Employers can only manage their own job posts.
- Jobs created by the logged-in employer are visually distinguished in the listings page.

### 👩‍💻 Job Seeker Features
- Browse all available job listings.
- View detailed job descriptions, salaries, and employers.
- Apply to jobs directly from the job details page.

### 💡 UI / UX
- Built with **Tailwind CSS** for a clean, responsive interface.
- Smooth animations and interactive elements with **Alpine.js**.
- Success and error alerts with session-based flash messages.
- “Create Job” floating action button with hover and bounce effects.

---

## 🧱 Tech Stack

| Layer | Technology |
|-------|-------------|
| Backend | Laravel 11 |
| Frontend | Blade Templates + Tailwind CSS + Alpine.js |
| Database | MySQL |
| Authentication | Laravel Breeze / Auth scaffolding |
| ORM | Eloquent (Employer ↔ User ↔ Job relationships) |

---

## 🗂️ Database Structure

**Tables:**
- `users` → Stores user accounts.
- `employers` → Linked to users (`user_id` foreign key).
- `job_listings` → Linked to employers (`employer_id` foreign key).

**Relationships:**
- A `User` has one `Employer`.
- An `Employer` has many `JobListings`.
- A `JobListing` belongs to an `Employer`.

---

**Screenshots:**
<img width="2992" height="1574" alt="image" src="https://github.com/user-attachments/assets/e61aa483-8995-4f82-af49-e59c2a005ffd" />
<img width="2896" height="1574" alt="image" src="https://github.com/user-attachments/assets/bfd5e59e-ee33-4ab2-8b70-d1492de1cd47" />
<img width="1788" height="1560" alt="image" src="https://github.com/user-attachments/assets/ae66333b-7a97-4e18-a123-8ebbae3a6584" />
<img width="1858" height="1558" alt="image" src="https://github.com/user-attachments/assets/e4f47a8c-2bb4-4474-a21d-c3a51870fba4" />
<img width="1724" height="1576" alt="image" src="https://github.com/user-attachments/assets/b41f15ba-ca48-4b0a-b176-f367e7a58625" />








