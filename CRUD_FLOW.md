# CRUD Operations Flow - Student Management System

## Overview
This document outlines the complete CRUD (Create, Read, Update, Delete) operations flow for three entities: **Students**, **School Classes**, and **Subjects**.

---

## Entity 1: STUDENTS

### Routes
- **Index**: `GET /students` → Display all students
- **Create**: `GET /students/create` → Show create form
- **Store**: `POST /students` → Save new student
- **Show**: `GET /students/{student}` → View single student
- **Edit**: `GET /students/{student}/edit` → Show edit form
- **Update**: `PUT /students/{student}` → Update student
- **Destroy**: `DELETE /students/{student}` → Delete student

### Controller: `StudentController`
- **index()**: Fetch all students with their class and display in table
- **create()**: Load all classes and show create form
- **store()**: Validate and create new student
- **show()**: Display detailed student information
- **edit()**: Load student and classes for editing
- **update()**: Validate and update student data
- **destroy()**: Delete student

### Validation Rules
```
name: required|string|max:255
email: required|email|unique:students
phone: required|string|max:20
class_id: required|exists:school_classes,id
```

### Views
- `students/index.blade.php` - List all students
- `students/create.blade.php` - Create student form
- `students/show.blade.php` - View student details
- `students/edit.blade.php` - Edit student form

---

## Entity 2: SCHOOL CLASSES

### Routes
- **Index**: `GET /classes` → Display all classes
- **Create**: `GET /classes/create` → Show create form
- **Store**: `POST /classes` → Save new class
- **Show**: `GET /classes/{class}` → View single class with students
- **Edit**: `GET /classes/{class}/edit` → Show edit form
- **Update**: `PUT /classes/{class}` → Update class
- **Destroy**: `DELETE /classes/{class}` → Delete class

### Controller: `SchoolClassController`
- **index()**: Fetch all classes with student count
- **create()**: Show create form
- **store()**: Validate and create new class
- **show()**: Display class details and list students
- **edit()**: Load class for editing
- **update()**: Validate and update class data
- **destroy()**: Delete class

### Validation Rules
```
class_name: required|string|max:255
grade: required|string|max:50
```

### Views
- `classes/index.blade.php` - List all classes
- `classes/create.blade.php` - Create class form
- `classes/show.blade.php` - View class details with students
- `classes/edit.blade.php` - Edit class form

---

## Entity 3: SUBJECTS

### Routes
- **Index**: `GET /subjects` → Display all subjects
- **Create**: `GET /subjects/create` → Show create form
- **Store**: `POST /subjects` → Save new subject
- **Show**: `GET /subjects/{subject}` → View single subject
- **Edit**: `GET /subjects/{subject}/edit` → Show edit form
- **Update**: `PUT /subjects/{subject}` → Update subject
- **Destroy**: `DELETE /subjects/{subject}` → Delete subject

### Controller: `SubjectController`
- **index()**: Fetch all subjects
- **create()**: Show create form
- **store()**: Validate and create new subject
- **show()**: Display subject details
- **edit()**: Load subject for editing
- **update()**: Validate and update subject data
- **destroy()**: Delete subject

### Validation Rules
```
subject_name: required|string|max:255|unique:subjects
```

### Views
- `subjects/index.blade.php` - List all subjects
- `subjects/create.blade.php` - Create subject form
- `subjects/show.blade.php` - View subject details
- `subjects/edit.blade.php` - Edit subject form

---

## Model Relationships

### Student Model
```php
- belongsTo(SchoolClass) - Each student belongs to one class
```

### SchoolClass Model
```php
- hasMany(Student) - One class has many students
```

### Subject Model
```php
- No relationships defined (can be expanded as needed)
```

---

## CRUD Flow Diagram

### Standard CRUD Flow for Each Entity:

1. **Create**: 
   - GET form → POST data → Validate → Insert → Redirect to index

2. **Read**:
   - Index: List all records
   - Show: View single record details

3. **Update**:
   - GET form with current data → PUT data → Validate → Update → Redirect to index

4. **Delete**:
   - DELETE request → Confirm → Delete → Redirect to index

---

## Files Created/Modified

### Controllers
- `app/Http/Controllers/StudentController.php` - CRUD operations for students
- `app/Http/Controllers/SchoolClassController.php` - CRUD operations for classes
- `app/Http/Controllers/SubjectController.php` - CRUD operations for subjects

### Views
- `resources/views/layout.blade.php` - Base layout with navigation
- `resources/views/students/` - Student views (index, create, show, edit)
- `resources/views/classes/` - Class views (index, create, show, edit)
- `resources/views/subjects/` - Subject views (index, create, show, edit)

### Routes
- `routes/web.php` - Resource routes for all three entities

### Models
- `app/Models/Student.php` - Updated with relationships
- `app/Models/SchoolClass.php` - Updated with relationships
- `app/Models/Subject.php` - Updated with factory trait

---

## How to Use

1. Navigate to http://localhost:8000/students, /classes, or /subjects
2. Click "Add [Entity]" to create new record
3. Click "View" to see details
4. Click "Edit" to modify record
5. Click "Delete" to remove record

All operations include validation and error handling!
