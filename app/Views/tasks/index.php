<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow Pro | Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root {
            --primary: #4f46e5;
            --surface: #ffffff;
            --bg: #f3f4f6;
            --text-main: #111827;
            --text-sub: #6b7280;
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: var(--bg); color: var(--text-main); }
        
        /* 8-point grid: Sidebar width 280px */
        .sidebar { width: 280px; height: 100vh; position: fixed; background: var(--surface); border-right: 1px solid #e5e7eb; padding: 32px 24px; }
        .main-content { margin-left: 280px; padding: 48px; }
        
        .nav-link { color: var(--text-sub); padding: 12px 16px; border-radius: 8px; font-weight: 500; transition: 0.2s; }
        .nav-link.active { background: #eef2ff; color: var(--primary); }
        
        .task-card { 
            background: var(--surface); 
            border-radius: 16px; 
            padding: 24px; 
            border: 1px solid rgba(0,0,0,0.05); 
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            margin-bottom: 16px;
        }
        
        .form-control-custom { 
            border: 2px solid #f3f4f6; 
            border-radius: 12px; 
            padding: 12px 16px; 
            transition: 0.3s;
        }
        .form-control-custom:focus { border-color: var(--primary); box-shadow: none; }
        
        .status-pill { padding: 4px 12px; border-radius: 999px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; }
        .status-pending { background: #fef3c7; color: #92400e; }
        .status-completed { background: #d1fae5; color: #065f46; }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="mb-5 px-3">
        <h4 class="fw-bold text-primary mb-0">TaskFlow <span class="text-dark">Pro</span></h4>
    </div>
    <nav class="nav flex-column gap-2">
        <a class="nav-link active" href="#">Dashboard</a>
        <a class="nav-link" href="#">Calendar</a>
        <a class="nav-link" href="#">Settings</a>
        <hr>
        <a class="nav-link text-danger" href="/logout">Logout</a>
    </nav>
</aside>

<main class="main-content">
    <div class="container-fluid">
        <header class="mb-5 d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fw-bold h3">Welcome Back!</h1>
                <p class="text-muted">Here’s what’s happening with your tasks today.</p>
            </div>
        </header>

        <div class="task-card mb-5">
            <form action="/tasks/create" method="post" class="row g-3">
                <div class="col-md-9">
                    <input type="text" name="title" class="form-control form-control-custom" placeholder="Write a new task..." required>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" style="border-radius: 12px;">Add Task</button>
                </div>
            </form>
        </div>

        <div class="row">
            <?php foreach($tasks as $task): ?>
            <div class="col-md-6 col-lg-4">
                <div class="task-card">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <span class="status-pill status-<?= $task['status'] ?>">
                            <?= $task['status'] ?>
                        </span>
                        <div class="dropdown">
                            <button class="btn btn-link text-muted p-0" type="button" data-bs-toggle="dropdown">•••</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/tasks/toggle/<?= $task['id'] ?>">Toggle Status</a></li>
                                <li><a class="dropdown-item text-danger" href="/tasks/delete/<?= $task['id'] ?>">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1 <?= $task['status'] == 'completed' ? 'text-decoration-line-through text-muted' : '' ?>">
                        <?= esc($task['title']) ?>
                    </h5>
                    <p class="text-muted small">Updated just now</p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>