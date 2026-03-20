<!DOCTYPE html>
<html lang="en">

<x-head />

<style>
    @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap');

    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --ink: #0d0d12;
        --paper: #f5f3ee;
        --accent: #c8f04e;
        --accent-dark: #a8d030;
        --muted: #8a8a96;
        --surface: #ffffff;
        --border: #e2e0d8;
    }

    html,
    body {
        height: 100%;
        font-family: 'DM Sans', sans-serif;
        background-color: var(--ink);
        color: var(--ink);
        overflow: hidden;
    }

    /* ── Background ── */
    .scene {
        position: fixed;
        inset: 0;
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .scene__left {
        background: var(--ink);
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 48px 52px;
    }

    /* Decorative grid lines */
    .scene__left::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(255, 255, 255, .04) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, .04) 1px, transparent 1px);
        background-size: 48px 48px;
        pointer-events: none;
    }

    /* Glowing orb */
    .orb {
        position: absolute;
        width: 360px;
        height: 360px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(200, 240, 78, 0.25) 0%, transparent 70%);
        bottom: -80px;
        left: -60px;
        pointer-events: none;
        animation: pulse 6s ease-in-out infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.1);
            opacity: 0.7;
        }
    }

    .badge__dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--accent);
        animation: blink 2s step-start infinite;
    }

    @keyframes blink {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }
    }

    .badge__text {
        font-size: 12px;
        font-weight: 500;
        color: rgba(255, 255, 255, .55);
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    /* Hero headline */
    .hero {
        position: relative;
        z-index: 1;
    }

    .hero__eyebrow {
        font-family: 'DM Sans', sans-serif;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 20px;
    }

    .hero__heading {
        font-family: 'Syne', sans-serif;
        font-size: clamp(40px, 4.5vw, 62px);
        font-weight: 800;
        line-height: 1.0;
        color: #fff;
        margin-bottom: 24px;
    }

    .hero__heading em {
        font-style: normal;
        color: var(--accent);
    }

    .hero__sub {
        font-size: 15px;
        line-height: 1.7;
        color: rgba(255, 255, 255, .4);
        max-width: 320px;
    }

    /* Stats row */
    .stats {
        display: flex;
        gap: 36px;
        position: relative;
        z-index: 1;
    }

    .stat__value {
        font-family: 'Syne', sans-serif;
        font-size: 28px;
        font-weight: 700;
        color: #fff;
    }

    .stat__label {
        font-size: 12px;
        color: rgba(255, 255, 255, .35);
        margin-top: 2px;
        letter-spacing: .04em;
    }

    /* ── Right panel ── */
    .scene__right {
        background: var(--paper);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 48px;
        position: relative;
    }

    /* Subtle texture */
    .scene__right::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='4' height='4' viewBox='0 0 4 4' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='0' y='0' width='1' height='1' fill='%23000' opacity='0.025'/%3E%3C/svg%3E");
        pointer-events: none;
    }

    .card {
        background: var(--surface);
        border-radius: 24px;
        padding: 52px 48px;
        width: 100%;
        max-width: 420px;
        position: relative;
        box-shadow:
            0 1px 2px rgba(0, 0, 0, .06),
            0 8px 32px rgba(0, 0, 0, .08),
            0 0 0 1px var(--border);
        animation: slideUp .55s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(28px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Accent stripe */
    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 40px;
        right: 40px;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--accent), transparent);
        border-radius: 0 0 4px 4px;
    }

    .card__eyebrow {
        font-size: 11px;
        font-weight: 500;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 10px;
    }

    .card__title {
        font-family: sans-serif;
        font-size: 28px;
        font-weight: 500;
        color: var(--ink);
        line-height: 1.2;
        margin-bottom: 6px;
    }

    .card__sub {
        font-size: 14px;
        color: var(--muted);
        margin-bottom: 36px;
    }

    /* Fields */
    .field {
        margin-bottom: 16px;
    }

    .field label {
        display: block;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: .06em;
        text-transform: uppercase;
        color: #555;
        margin-bottom: 8px;
    }

    .field__wrap {
        position: relative;
    }

    .field__icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--muted);
        pointer-events: none;
    }

    .field input {
        width: 100%;
        padding: 14px 16px 14px 44px;
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        color: var(--ink);
        background: var(--paper);
        border: 1.5px solid var(--border);
        border-radius: 12px;
        outline: none;
        transition: border-color .2s, box-shadow .2s, background .2s;
    }

    .field input::placeholder {
        color: #bbb;
    }

    .field input:focus {
        border-color: var(--ink);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(13, 13, 18, .07);
    }

    /* Row helpers */
    .row-between {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 20px 0 28px;
    }

    .check-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: var(--muted);
        cursor: pointer;
        user-select: none;
    }

    .check-label input[type="checkbox"] {
        appearance: none;
        width: 17px;
        height: 17px;
        border: 1.5px solid var(--border);
        border-radius: 5px;
        cursor: pointer;
        position: relative;
        transition: background .15s, border-color .15s;
    }

    .check-label input[type="checkbox"]:checked {
        background: var(--ink);
        border-color: var(--ink);
    }

    .check-label input[type="checkbox"]:checked::after {
        content: '';
        position: absolute;
        left: 4px;
        top: 1px;
        width: 5px;
        height: 9px;
        border: 2px solid var(--accent);
        border-top: none;
        border-left: none;
        transform: rotate(45deg);
    }

    .forgot {
        font-size: 13px;
        color: var(--muted);
        text-decoration: none;
        transition: color .15s;
    }

    .forgot:hover {
        color: var(--ink);
    }

    /* CTA button */
    .btn-primary {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        padding: 16px;
        font-family: 'Syne', sans-serif;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: .06em;
        text-transform: uppercase;
        color: var(--ink);
        background: var(--accent);
        border: none;
        border-radius: 14px;
        cursor: pointer;
        transition: background .2s, transform .15s, box-shadow .2s;
        box-shadow: 0 4px 16px rgba(200, 240, 78, 0.35);
    }

    .btn-primary:hover {
        background: var(--accent-dark);
        transform: translateY(-1px);
        box-shadow: 0 8px 24px rgba(200, 240, 78, 0.4);
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    .btn-primary svg {
        transition: transform .2s;
    }

    .btn-primary:hover svg {
        transform: translateX(4px);
    }

    /* Divider */
    .divider {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 24px 0;
    }

    .divider__line {
        flex: 1;
        height: 1px;
        background: var(--border);
    }

    .divider__text {
        font-size: 12px;
        color: #bbb;
        letter-spacing: .06em;
    }

    /* Register link */
    .register-hint {
        text-align: center;
        font-size: 13.5px;
        color: var(--muted);
    }

    .register-hint a {
        color: var(--ink);
        font-weight: 600;
        text-decoration: none;
        border-bottom: 1.5px solid var(--accent);
        padding-bottom: 1px;
        transition: border-color .2s;
    }

    .register-hint a:hover {
        border-color: var(--ink);
    }

    /* Responsive */
    @media (max-width: 820px) {
        .scene {
            grid-template-columns: 1fr;
            overflow-y: auto;
        }

        .scene__left {
            display: none;
        }

        .scene__right {
            min-height: 100vh;
        }
    }
</style>

<body>
    <div class="scene">

        <!-- ── Left: Brand panel ── -->
        <div class="scene__left">
            <div class="orb"></div>

            <div class="badge">

            </div>

            <div class="hero">
                <p class="hero__eyebrow">Welcome back</p>
                <h1 class="hero__heading">
                    Work<br>smarter,<br><em>not harder.</em>
                </h1>
                <p class="hero__sub">
                    Your command centre for everything that matters. Pick up right where you left off.
                </p>
            </div>

            <div class="stats">

            </div>
        </div>

        <!-- ── Right: Form panel ── -->
        <div class="scene__right">
            <div class="card">
                <p class="card__eyebrow">Secure access</p>
                <h2 class="card__title">Sign in</h2>
                <p class="card__sub">Enter your credentials to continue.</p>

                <form>
                    <div class="field">
                        <label for="email">Email address</label>
                        <div class="field__wrap">
                            <svg class="field__icon" width="16" height="16" fill="none" stroke="currentColor"
                                stroke-width="1.8" viewBox="0 0 24 24">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                            <input type="email" id="email" placeholder="you@company.com" autocomplete="off">
                        </div>
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <div class="field__wrap">
                            <svg class="field__icon" width="16" height="16" fill="none" stroke="currentColor"
                                stroke-width="1.8" viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                            <input type="password" id="password" placeholder="••••••••" autocomplete="current-password">
                        </div>
                    </div>

                    <div class="row-between">
                        <label class="check-label">
                            <input type="checkbox"> Keep me signed in
                        </label>
                        <a href="#" class="forgot">Forgot password?</a>
                    </div>

                    <button type="button" class="btn-primary">
                        Sign in
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2"
                            viewBox="0 0 24 24">
                            <line x1="5" y1="12" x2="19" y2="12" />
                            <polyline points="12 5 19 12 12 19" />
                        </svg>
                    </button>

                    <div class="divider">
                        <span class="divider__line"></span>
                        <span class="divider__text">or</span>
                        <span class="divider__line"></span>
                    </div>

                    <p class="register-hint">
                        Don't have an account? <a href="{{ route('register') }}">Create one</a>
                    </p>
                </form>
            </div>
        </div>

    </div>

    <x-script />
</body>

</html>
