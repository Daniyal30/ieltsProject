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
    }

    /* ── Layout ── */
    .scene {
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 100vh;
    }

    /* ── LEFT PANEL ── */
    .scene__left {
        background: var(--ink);
        position: sticky;
        /* stays fixed while right scrolls */
        top: 0;
        height: 100vh;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 48px 52px;
    }

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

    .hero {
        position: relative;
        z-index: 1;
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

    /* ── RIGHT PANEL ── */
    .scene__right {
        background: var(--paper);
        display: flex;
        align-items: flex-start;
        justify-content: center;
        padding: 48px;
        /* This is the scrollable side */
        overflow-y: auto;
        min-height: 100vh;
    }

    .scene__right::before {
        content: '';
        position: fixed;
        /* texture stays but doesn't block scroll */
        top: 0;
        right: 0;
        width: 50%;
        height: 100%;
        background-image: url("data:image/svg+xml,%3Csvg width='4' height='4' viewBox='0 0 4 4' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='0' y='0' width='1' height='1' fill='%23000' opacity='0.025'/%3E%3C/svg%3E");
        pointer-events: none;
        z-index: 0;
    }

    /* ── CARD ── */
    .card {
        background: var(--surface);
        border-radius: 24px;
        padding: 48px 44px;
        width: 100%;
        max-width: 460px;
        position: relative;
        z-index: 1;
        box-shadow:
            0 1px 2px rgba(0, 0, 0, .06),
            0 8px 32px rgba(0, 0, 0, .08),
            0 0 0 1px var(--border);
        animation: slideUp .55s cubic-bezier(0.22, 1, 0.36, 1) both;
        margin: auto 0;
        /* vertical centering when content is short */
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
        font-weight: 700;
        color: var(--ink);
        line-height: 1.2;
        margin-bottom: 6px;
    }

    .card__sub {
        font-size: 14px;
        color: var(--muted);
        margin-bottom: 32px;
    }

    /* ── FIELDS ── */
    .field {
        margin-bottom: 14px;
    }

    .field label {
        display: block;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: #555;
        margin-bottom: 7px;
    }

    .field__wrap {
        position: relative;
    }

    .field__icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--muted);
        pointer-events: none;
        display: flex;
        align-items: center;
        z-index: 1;
    }

    /* textarea icon sits at top */
    .field__icon--top {
        top: 14px;
        transform: none;
    }

    /* Base style shared by ALL form controls */
    .field input,
    .field select,
    .field textarea {
        width: 100%;
        padding: 13px 14px 13px 42px;
        font-family: 'DM Sans', sans-serif;
        font-size: 14px;
        color: var(--ink);
        background: var(--paper);
        border: 1.5px solid var(--border);
        border-radius: 12px;
        outline: none;
        transition: border-color .2s, box-shadow .2s, background .2s;
        appearance: none;
        -webkit-appearance: none;
    }

    .field input::placeholder,
    .field textarea::placeholder {
        /* color: #bbb; */
    }

    .field select {
        cursor: pointer;
        color: var(--ink);
    }


    .field textarea {
        resize: vertical;
        min-height: 90px;
        padding-top: 13px;
        line-height: 1.5;
    }

    /* file input special */
    .field input[type="file"] {
        padding: 10px 14px 10px 42px;
        cursor: pointer;
        font-size: 13px;
        color: var(--muted);
    }

    .field input[type="file"]::-webkit-file-upload-button {
        font-family: 'DM Sans', sans-serif;
        font-size: 12px;
        font-weight: 500;
        background: var(--ink);
        color: var(--accent);
        border: none;
        border-radius: 6px;
        padding: 5px 12px;
        cursor: pointer;
        margin-right: 10px;
    }

    /* Select dropdown arrow */
    .select-wrap::after {
        content: '';
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        border-top: 5px solid var(--muted);
        pointer-events: none;
    }

    /* Focus states */
    .field input:focus,
    .field select:focus,
    .field textarea:focus {
        border-color: var(--ink);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(13, 13, 18, .07);
    }

    /* ── 2-COLUMN ROW ── */
    .field-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    /* ── BUTTON ── */
    .btn-primary {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        padding: 16px;
        margin-top: 8px;
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

    /* ── DIVIDER ── */
    .divider {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 22px 0;
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

    /* ── HINT ── */
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

    .field__error {
        font-size: 12px;
        color: #e53e3e;
        margin-top: 5px;
        padding-left: 4px;
    }

    .register-hint a:hover {
        border-color: var(--ink);
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 820px) {
        .scene {
            grid-template-columns: 1fr;
        }

        .scene__left {
            display: none;
        }

        .scene__right {
            padding: 32px 20px;
        }

        .field-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<body>
    <div class="scene">

        <!-- ── Left: Brand panel ── -->
        <div class="scene__left">
            <div class="orb"></div>
            <div class="hero">
                <h1 class="hero__heading">
                    IELTS<br>Preparation,<br><em>Platform.</em>
                </h1>
                <p class="hero__sub">
                    Join thousands of students who have achieved their target band score with our structured,
                    expert-guided preparation system.
                </p>
            </div>
        </div>

        <!-- ── Right: Form panel ── -->
        <div class="scene__right">
            <div class="card">
                <p class="card__eyebrow">Create account</p>
                <h2 class="card__title">Register</h2>
                <p class="card__sub">Fill in your details to get started.</p>

                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Full Name -->
                    <div class="field">
                        <label for="username">Full Name <span class="text-danger">*</span></label>
                        <div class="field__wrap">
                            <span class="field__icon">
                                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.8"
                                    viewBox="0 0 24 24">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </span>
                            <input type="text" id="username" value="{{ old('name') }}" name="name"
                                placeholder="e.g. Ahmed Khan" autocomplete="off">
                        </div>
                        @error('name')
                            <p class="field__error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="field">
                        <label for="email">Email Address <span class="text-danger">*</span></label>
                        <div class="field__wrap">
                            <span class="field__icon">
                                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.8"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                            </span>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="you@email.com" autocomplete="off">
                        </div>
                        @error('email')
                            <p class="field__error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone + DOB (2 column) -->
                    <div class="field-row">
                        <div class="field">
                            <label for="phone">Phone <span class="text-danger">*</span></label>
                            <div class="field__wrap">
                                <span class="field__icon">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.8"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.78a16 16 0 0 0 6.29 6.29l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                                    </svg>
                                </span>
                                <input type="tel" id="phone" value="{{ old('phone') }}" name="phone"
                                    placeholder="03001234567" autocomplete="off">
                            </div>
                            @error('phone')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="dob">Date of Birth <span class="text-danger">*</span></label>
                            <div class="field__wrap">
                                <span class="field__icon">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.8"
                                        viewBox="0 0 24 24">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                        <line x1="16" y1="2" x2="16" y2="6" />
                                        <line x1="8" y1="2" x2="8" y2="6" />
                                        <line x1="3" y1="10" x2="21" y2="10" />
                                    </svg>
                                </span>
                                <input type="date" id="dob" name="date_of_birth" value="{{ old('date_of_birth') }}" autocomplete="off">
                            </div>
                            @error('date_of_birth')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Gender + Band Score (2 column) -->
                    <div class="field-row">
                        <div class="field">
                            <label for="gender">Gender <span class="text-danger">*</span></label>
                            <div class="field__wrap select-wrap">
                                <span class="field__icon">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.8"
                                        viewBox="0 0 24 24">
                                        <circle cx="12" cy="8" r="4" />
                                        <path d="M12 14v7" />
                                        <path d="M9 18h6" />
                                    </svg>
                                </span>
                                <select id="gender" name="gender" class="placeholder"
                                    onchange="this.classList.remove('placeholder')">
                                    <option value="" disabled selected>Select</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                            </div>
                            @error('gender')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="band_score">Target Band <span class="text-danger">*</span></label>
                            <div class="field__wrap select-wrap">
                                <span class="field__icon">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.8"
                                        viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                </span>
                                <select id="band_score" name="target_band_score" class="placeholder"
                                    onchange="this.classList.remove('placeholder')">
                                    <option value="" disabled selected>Score</option>
                                    <option value="5" {{ old('target_band_score') == '5' ? 'selected' : '' }}>5.0</option>
                                    <option value="5.5" {{ old('target_band_score') == '5.5' ? 'selected' : '' }}>5.5
                                    </option>
                                    <option value="6" {{ old('target_band_score') == '6' ? 'selected' : '' }}>6.0</option>
                                    <option value="6.5" {{ old('target_band_score') == '6.5' ? 'selected' : '' }}>6.5
                                    </option>
                                    <option value="7" {{ old('target_band_score') == '7' ? 'selected' : '' }}>7.0</option>
                                    <option value="7.5" {{ old('target_band_score') == '7.5' ? 'selected' : '' }}>7.5
                                    </option>
                                    <option value="8" {{ old('target_band_score') == '8' ? 'selected' : '' }}>8.0</option>
                                    <option value="8.5" {{ old('target_band_score') == '8.5' ? 'selected' : '' }}>8.5
                                    </option>
                                    <option value="9" {{ old('target_band_score') == '9' ? 'selected' : '' }}>9.0</option>
                                </select>
                            </div>
                            @error('target_band_score')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Profile Image -->
                    <div class="field">
                        <label for="profile_image">Profile Image</label>
                        <div class="field__wrap">
                            <span class="field__icon">
                                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.8"
                                    viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                                    <circle cx="8.5" cy="8.5" r="1.5" />
                                    <polyline points="21 15 16 10 5 21" />
                                </svg>
                            </span>
                            <input type="file" id="profile_image" name="profile_image" accept="image/*">
                        </div>
                        @error('profile_image')
                            <p class="field__error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="field">
                        <label for="address">Address</label>
                        <div class="field__wrap">
                            <span class="field__icon field__icon--top">
                                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.8"
                                    viewBox="0 0 24 24">
                                    <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            </span>
                            <textarea id="address" name="address"
                                placeholder="Street, City, Country">{{ old('address') }}</textarea>
                        </div>
                        @error('address')
                            <p class="field__error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password + Confirm (2 column) -->
                    <div class="field-row">
                        <div class="field">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <div class="field__wrap">
                                <span class="field__icon">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.8"
                                        viewBox="0 0 24 24">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg>
                                </span>
                                <input type="password" id="password" name="password" placeholder="Min. 8 chars">
                            </div>
                            @error('password')
                                <p class="field__error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="password_confirmation">Confirm</label>
                            <div class="field__wrap">
                                <span class="field__icon">
                                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="1.8"
                                        viewBox="0 0 24 24">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg>
                                </span>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="Re-enter">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-primary">
                        Create Account
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.2"
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
                        Already have an account? <a href="{{ route('signIn') }}">Login</a>
                    </p>

                </form>
            </div>
        </div>

    </div>

    <x-script />
</body>

</html>
