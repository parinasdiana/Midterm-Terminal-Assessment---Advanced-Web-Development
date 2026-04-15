<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #f163ea 0%, #aa038b 100%);
        --glass-bg: rgba(255, 255, 255, 0.03);
        --glass-border: rgba(255, 255, 255, 0.1);
        --text-dim: #94a3b8;
    }

    body {
        margin: 0;
        padding: 0;
        background: #0f172a; /* Deep slate background */
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* 8-point grid: Padding 40px (8*5) */
    .login-card {
        width: 100%;
        max-width: 440px;
        padding: 40px;
        background: var(--glass-bg);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid var(--glass-border);
        border-radius: 24px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    .brand-logo {
        width: 48px;
        height: 48px;
        background: var(--primary-gradient);
        border-radius: 12px;
        margin: 0 auto 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: white;
    }

    h2 { color: #f8fafc; font-weight: 700; margin-bottom: 8px; text-align: center; }
    p.subtitle { color: var(--text-dim); text-align: center; margin-bottom: 32px; font-size: 0.95rem; }

    .form-group { margin-bottom: 20px; }
    
    .label-accent {
        display: block;
        font-size: 0.75rem;
        font-weight: 700;
        color: #ff00ee;
        letter-spacing: 0.05em;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .input-modern {
        width: 100%;
        background: rgba(0, 0, 0, 0.2);
        border: 1px solid var(--glass-border);
        border-radius: 12px;
        padding: 14px 16px;
        color: white;
        transition: all 0.3s ease;
    }

    .input-modern:focus {
        outline: none;
        border-color: #6366f1;
        background: rgba(0, 0, 0, 0.4);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }

    .btn-login {
        width: 100%;
        padding: 14px;
        margin-top: 12px;
        border: none;
        border-radius: 12px;
        background: var(--primary-gradient);
        color: white;
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .btn-login:hover {
        transform: translateY(-1px);
        box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.3);
    }

    .footer-link {
        text-align: center;
        margin-top: 24px;
        font-size: 0.875rem;
        color: var(--text-dim);
    }

    .footer-link a { color: #f881ea; text-decoration: none; font-weight: 600; }
</style>

<div class="login-card">
    <div class="brand-logo">TF</div>
    <h2>Sign In</h2>
    <p class="subtitle">Secure access to TaskFlow Pro Dashboard</p>
    
    <form action="/login" method="post">
        <div class="form-group">
            <label class="label-accent">Email Address</label>
            <input type="email" name="email" class="input-modern" placeholder="admin@itstudent.com" required>
        </div>
        
        <div class="form-group">
            <label class="label-accent">Password</label>
            <input type="password" name="password" class="input-modern" placeholder="••••••••" required>
        </div>
        
        <button type="submit" class="btn-login">Access Dashboard</button>
    </form>
    
    <div class="footer-link">
    Don't have an account? <a href="<?= base_url('register') ?>">Create one</a>
</div>
</div>