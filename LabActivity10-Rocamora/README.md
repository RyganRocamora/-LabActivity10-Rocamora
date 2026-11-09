# Barangay Bulletin — Purok Rocamora

An online bulletin board web application built with Laravel 12, Eloquent ORM, and Tailwind CSS for Barangay Matina Crossing in Davao City. This platform allows residents to browse, search, filter, and view official barangay announcements, health updates, and community news.

---

## 📌 Personalized Lab Details
- **Barangay Bulletin Title**: `Barangay Bulletin - Purok Rocamora`
- **Student Last Name**: Rocamora
- **Posts Per Page**: `8` (Derived from the 8 letters in "Rocamora")
- **Kagawad Author**: `Kagawad Firstname Rocamora` (`kagawad.rocamora@bulletin.test`)
- **Custom 5th Category**: `Disaster Preparedness`
- **Pinned Birthday Post**: `Purok Rocamora Clean-up Drive` (Published on 2026-05-15)

---

##  Features & Implementation
- **Eloquent ORM & ActiveRecord**: Utilizes Laravel Eloquent models (`Author`, `Post`) with `$fillable` mass assignment protection and property casting for booleans and datetimes.
- **Database Migrations**: Structured database schema built via Artisan migrations, including a primary `authors` table, a `posts` table with foreign key constraints (`author_id`), and an incremental alter migration `add_views_to_posts_table`.
- **Database Seeders & Factories**: Seeded with 5 authors and 51 total posts (40 published, 10 drafts, and 1 pinned post) using Faker factories and a custom `draft()` state.
- **Query Builder Filtering**: Supports live title search (`?q=`) and category filtering (`?category=`) on published posts.
- **Dynamic Pagination**: Custom pagination maintaining query parameters across pages using `withQueryString()`.
- **View Counter**: Automatically increments view counts upon viewing individual announcement details via `PostController@show`.

---

## How to Run the Project Locally

### 1. Prerequisites
Ensure you have PHP 8.2+, Composer, and Node.js installed on your system.

### 2. Installation Steps

Clone the repository to your local computer:
```bash
git clone [https://github.com/](https://github.com/)<your-username>/LabActivity10-Rocamora.git
cd LabActivity10-Rocamora