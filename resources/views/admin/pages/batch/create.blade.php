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

    /* ── Layout ── */
    .scene {
        position: fixed;
        inset: 0;
        display: grid;
        grid-template-columns: 260px 1fr;
    }

    /* ── Sidebar ── */
    .sidebar {
        background: var(--ink);
        display: flex;
        flex-direction: column;
        border-right: 1px solid rgba(255, 255, 255, 0.06);
        position: relative;
        overflow: hidden;
    }

    .sidebar::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(255, 255, 255, .03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, .03) 1px, transparent 1px);
        background-size: 40px 40px;
        pointer-events: none;
    }

    .orb {
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(200, 240, 78, 0.18) 0%, transparent 70%);
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
            opacity: 0.6;
        }
    }

    .sidebar__logo {
        padding: 28px 24px 20px;
        position: relative;
        z-index: 1;
    }

    .logo-text {
        font-family: 'Syne', sans-serif;
        font-size: 20px;
        font-weight: 800;
        color: #fff;
        letter-spacing: .02em;
    }

    .logo-text em {
        font-style: normal;
        color: var(--accent);
    }

    .sidebar__profile {
        padding: 14px 18px;
        margin: 0 12px;
        border-radius: 14px;
        background: rgba(255, 255, 255, .04);
        border: 1px solid rgba(255, 255, 255, .07);
        display: flex;
        align-items: center;
        gap: 12px;
        position: relative;
        z-index: 1;
    }

    .avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: var(--accent);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Syne', sans-serif;
        font-size: 13px;
        font-weight: 700;
        color: var(--ink);
        flex-shrink: 0;
    }

    .profile-info__name {
        font-size: 13px;
        font-weight: 500;
        color: #fff;
    }

    .profile-info__role {
        font-size: 11px;
        color: rgba(255, 255, 255, .35);
        margin-top: 2px;
    }

    .online-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--accent);
        margin-left: auto;
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

    .sidebar__nav {
        flex: 1;
        padding: 20px 12px;
        position: relative;
        z-index: 1;
        overflow-y: auto;
    }

    .sidebar__nav::-webkit-scrollbar {
        width: 0;
    }

    .nav-section-label {
        font-size: 10px;
        font-weight: 500;
        letter-spacing: .14em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, .2);
        padding: 0 12px;
        margin: 16px 0 8px;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 11px 14px;
        border-radius: 11px;
        cursor: pointer;
        transition: background .15s;
        margin-bottom: 2px;
        text-decoration: none;
    }

    .nav-item:hover {
        background: rgba(255, 255, 255, .05);
    }

    .nav-item.active {
        background: rgba(200, 240, 78, .12);
        border: 1px solid rgba(200, 240, 78, .2);
    }

    .nav-item.active .nav-icon {
        color: var(--accent);
    }

    .nav-item.active .nav-label {
        color: #fff;
    }

    .nav-icon {
        width: 18px;
        height: 18px;
        color: rgba(255, 255, 255, .3);
        flex-shrink: 0;
    }

    .nav-label {
        font-size: 13.5px;
        color: rgba(255, 255, 255, .45);
        font-weight: 400;
    }

    .nav-badge {
        margin-left: auto;
        background: var(--accent);
        color: var(--ink);
        font-size: 10px;
        font-weight: 700;
        padding: 2px 7px;
        border-radius: 20px;
        font-family: 'Syne', sans-serif;
    }

    .sidebar__footer {
        padding: 14px 12px;
        border-top: 1px solid rgba(255, 255, 255, .06);
        position: relative;
        z-index: 1;
    }

    .signout-btn {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 11px 14px;
        border-radius: 11px;
        cursor: pointer;
        transition: background .15s;
        text-decoration: none;
        background: none;
        border: none;
        width: 100%;
    }

    .signout-btn:hover {
        background: rgba(255, 80, 80, .08);
    }

    .signout-btn .nav-label {
        color: rgba(255, 255, 255, .3);
        font-size: 13px;
    }

    /* ── Main panel ── */
    .main-panel {
        background: var(--paper);
        display: flex;
        flex-direction: column;
        width: 100%;
        overflow: hidden;
    }

    /* Topbar */
    .topbar {
        background: var(--surface);
        border-bottom: 1px solid var(--border);
        padding: 0 32px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-shrink: 0;
    }

    .topbar__left {
        display: flex;
        flex-direction: column;
    }

    .topbar__eyebrow {
        font-size: 10px;
        font-weight: 500;
        letter-spacing: .14em;
        text-transform: uppercase;
        color: var(--muted);
    }

    .topbar__title {
        font-family: 'Syne', sans-serif;
        font-size: 18px;
        font-weight: 700;
        color: var(--ink);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .topbar__title .icon-badge {
        width: 28px;
        height: 28px;
        background: linear-gradient(135deg, var(--accent), var(--accent-dark));
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .topbar__right {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .icon-btn {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        border: 1.5px solid var(--border);
        background: var(--paper);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: relative;
        transition: background .2s, border-color .2s;
    }

    .icon-btn:hover {
        background: #fff;
        border-color: #ccc;
    }

    .notif-dot {
        position: absolute;
        top: 8px;
        right: 8px;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--accent);
        border: 2px solid var(--surface);
    }

    /* Content */
    .content {
        flex: 1;
        overflow-y: auto;
        padding: 32px;
    }

    .content::-webkit-scrollbar {
        width: 6px;
    }

    .content::-webkit-scrollbar-track {
        background: transparent;
    }

    .content::-webkit-scrollbar-thumb {
        background: var(--border);
        border-radius: 3px;
    }

    /* ── Page Header ── */
    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 28px;
        animation: slideUp .4s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    .page-header__left h1 {
        font-family: sans-serif;
        font-size: 22px;
        font-weight: 800;
        color: var(--ink);
    }

    .page-header__left p {
        font-size: 13px;
        color: var(--muted);
        margin-top: 3px;
    }

    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: var(--muted);
    }

    .breadcrumb a {
        color: var(--muted);
        text-decoration: none;
        transition: color .15s;
    }

    .breadcrumb a:hover {
        color: var(--ink);
    }

    .breadcrumb span {
        color: var(--ink);
        font-weight: 500;
    }

    /* ── Form Card ── */
    .form-card {
        background: var(--surface);
        border-radius: 20px;
        box-shadow:
            0 1px 2px rgba(0, 0, 0, .05),
            0 4px 20px rgba(0, 0, 0, .06),
            0 0 0 1px var(--border);
        overflow: hidden;
        animation: slideUp .5s cubic-bezier(0.22, 1, 0.36, 1) both;
        animation-delay: .1s;
    }

    .form-card::before {
        content: '';
        display: block;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--accent), transparent);
    }

    .form-card__inner {
        padding: 32px;
    }

    .form-card__title {
        font-family: 'Syne', sans-serif;
        font-size: 15px;
        font-weight: 700;
        color: var(--ink);
        margin-bottom: 4px;
    }

    .form-card__sub {
        font-size: 12px;
        color: var(--muted);
        margin-bottom: 28px;
    }

    /* ── Form Fields ── */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    label {
        font-size: 12px;
        font-weight: 500;
        color: var(--ink);
        letter-spacing: .02em;
    }

    label .required {
        color: #dc5050;
        margin-left: 3px;
    }

    .input-wrap {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon {
        position: absolute;
        left: 13px;
        color: var(--muted);
        display: flex;
        align-items: center;
        pointer-events: none;
    }

    input[type="text"],
    input[type="url"],
    input[type="number"],
    select {
        width: 100%;
        padding: 11px 14px 11px 38px;
        border: 1.5px solid var(--border);
        border-radius: 11px;
        font-family: 'DM Sans', sans-serif;
        font-size: 13.5px;
        color: var(--ink);
        background: var(--paper);
        outline: none;
        transition: border-color .2s, background .2s, box-shadow .2s;
        appearance: none;
    }

    input[type="text"]:focus,
    input[type="url"]:focus,
    input[type="number"]:focus,
    select:focus {
        border-color: var(--ink);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(200, 240, 78, .2);
    }

    input::placeholder {
        color: var(--muted);
    }

    /* Select arrow */
    .select-wrap::after {
        content: '';
        position: absolute;
        right: 14px;
        width: 8px;
        height: 8px;
        border-right: 1.5px solid var(--muted);
        border-bottom: 1.5px solid var(--muted);
        transform: rotate(45deg) translateY(-3px);
        pointer-events: none;
    }

    /* ── Toggle Switch ── */
    .toggle-group {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 18px;
        background: var(--paper);
        border: 1.5px solid var(--border);
        border-radius: 11px;
        transition: border-color .2s;
    }

    .toggle-group:hover {
        border-color: #ccc;
    }

    .toggle-label-wrap {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .toggle-label {
        font-size: 13.5px;
        font-weight: 500;
        color: var(--ink);
    }

    .toggle-hint {
        font-size: 11px;
        color: var(--muted);
    }

    .toggle {
        position: relative;
        width: 44px;
        height: 24px;
        flex-shrink: 0;
    }

    .toggle input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-track {
        position: absolute;
        inset: 0;
        background: var(--border);
        border-radius: 24px;
        cursor: pointer;
        transition: background .25s;
    }

    .toggle-thumb {
        position: absolute;
        top: 3px;
        left: 3px;
        width: 18px;
        height: 18px;
        background: #fff;
        border-radius: 50%;
        transition: transform .25s;
        box-shadow: 0 1px 4px rgba(0, 0, 0, .2);
        pointer-events: none;
    }

    .toggle input:checked~.toggle-track {
        background: var(--accent);
    }

    .toggle input:checked~.toggle-thumb {
        transform: translateX(20px);
    }

    /* ── Form Actions ── */
    .form-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        padding-top: 12px;
        margin-top: 12px;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        background: var(--ink);
        color: #fff;
        border: none;
        border-radius: 11px;
        font-family: 'Syne', sans-serif;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: background .2s, transform .15s;
    }

    .btn-primary:hover {
        background: #1e1e2e;
        transform: translateY(-1px);
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    .btn-accent {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        background: var(--accent);
        color: var(--ink);
        border: none;
        border-radius: 11px;
        font-family: 'Syne', sans-serif;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: background .2s, transform .15s;
    }

    .btn-accent:hover {
        background: var(--accent-dark);
        transform: translateY(-1px);
    }

    .btn-accent:active {
        transform: translateY(0);
    }

    .btn-ghost {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 20px;
        background: transparent;
        color: var(--muted);
        border: 1.5px solid var(--border);
        border-radius: 11px;
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        font-weight: 400;
        cursor: pointer;
        transition: background .2s, border-color .2s, color .2s;
        text-decoration: none;
    }

    .btn-ghost:hover {
        background: var(--paper);
        border-color: #ccc;
        color: var(--ink);
    }

    /* ── Icon Picker ── */
    .icon-picker-grid {
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        gap: 8px;
        padding: 14px;
        background: var(--paper);
        border: 1.5px solid var(--border);
        border-radius: 11px;
    }

    .icon-option {
        width: 100%;
        aspect-ratio: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        border: 1.5px solid transparent;
        cursor: pointer;
        transition: background .15s, border-color .15s;
        color: var(--muted);
    }

    .icon-option:hover {
        background: #fff;
        border-color: var(--border);
        color: var(--ink);
    }

    .icon-option.selected {
        background: rgba(200, 240, 78, .2);
        border-color: var(--accent);
        color: var(--ink);
    }


    #iconPreview {
        position: absolute;
        right: 30px;
        font-size: 20px;
        color: #374151;
        pointer-events: none;
    }

    .hint-text {
        font-size: 11px;
        color: var(--muted);
        margin-top: 5px;
    }

    /* ── Animations ── */
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(16px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ── Responsive ── */
    @media (max-width: 768px) {
        .scene {
            grid-template-columns: 1fr;
        }

        .sidebar {
            display: none;
        }

        .content {
            padding: 20px 16px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .icon-picker-grid {
            grid-template-columns: repeat(6, 1fr);
        }
    }
</style>

<body>
    <div class="scene">


        <aside class="sidebar">
            <div class="orb"></div>

            <div class="sidebar__logo">
                <div class="logo-text">Work<em>Smart</em></div>
            </div>

            <div class="sidebar__profile">
                <div class="avatar">AD</div>
                <div class="profile-info">
                    <div class="profile-info__name">Admin</div>
                </div>
                <div class="online-dot"></div>
            </div>

            <x-sidebar />
        </aside>


        <div class="main-panel">


            <header class="topbar">
                <div class="topbar__left">
                    <span class="topbar__eyebrow">Batch Management</span>
                    <div class="topbar__title">
                        <div class="icon-badge">
                            <svg width="14" height="14" fill="none" stroke="var(--ink)" stroke-width="2.2"
                                viewBox="0 0 24 24">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                        </div>
                        Create Batch
                    </div>
                </div>
                <div class="topbar__right">
                    <div class="icon-btn">
                        <svg width="16" height="16" fill="none" stroke="var(--muted)" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                        </svg>
                        <div class="notif-dot"></div>
                    </div>
                    <div class="icon-btn">
                        <svg width="16" height="16" fill="none" stroke="var(--muted)" stroke-width="2"
                            viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="4" />
                            <path d="M20 21a8 8 0 1 0-16 0" />
                        </svg>
                    </div>
                </div>
            </header>


            <main class="content">


                <div class="page-header">
                    <div class="page-header__left">
                        <h1>New Batch</h1>
                        <p>Enter the required details to create a new batch and organize your students efficiently.</p>
                    </div>
                    <div class="breadcrumb">
                        <a href="{{ route('admin.index') }}">Dashboard</a>
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                        <a href="{{ route('batch.index') }}">Batch</a>
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                        <span>Create</span>
                    </div>
                </div>


                <div class="form-card">
                    <div class="form-card__inner">
                        <div class="form-card__title">Item Details</div>
                        <div class="form-card__sub">All fields marked with * are required.</div>

                        <form action="{{ route('batch.store') }}" method="post">
                            @csrf
                            <div class="form-grid">


                                <div class="form-group">
                                    <label for="title">Name <span class="required">*</span></label>
                                    <div class="input-wrap">
                                        <span class="input-icon">
                                            <svg width="15" height="15" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24">
                                                <path d="M12 20h9" />
                                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                                            </svg>
                                        </span>
                                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                                            placeholder="e.g. Dashboard, Reports...">
                                    </div>
                                    @error('name')
                                        <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="url">Days <span class="required">*</span></label>
                                    <div class="input-wrap">
                                        <span class="input-icon">
                                            <svg width="15" height="15" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24">
                                                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
                                                <path
                                                    d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
                                            </svg>
                                        </span>
                                        <select class="filter-select" name="is_active">
                                            <option value="">Select Days</option>
                                            <option value="0"
                                                {{ request('status') == 'active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="1"
                                                {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>
                                    @error('route_name')
                                        <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                    @enderror
                                </div>


                                {{-- <div class="form-group">
                                    <label for="icon">Icon Name <span class="required">*</span></label>
                                    <div class="input-wrap select-wrap">
                                        <span class="input-icon">
                                            <svg width="15" height="15" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="10" />
                                                <line x1="12" y1="8" x2="12" y2="12" />
                                                <line x1="12" y1="16" x2="12.01" y2="16" />
                                            </svg>
                                        </span>

                                        <select name="icon" id="icon" onchange="showIcon(this.value)">
                                            <option value="">-- Select Icon --</option>
                                            @foreach ($icons as $icon)
                                                <option value="{{ $icon->class_name }}" {{ old('icon') == $icon->class_name ? 'selected' : '' }}>
                                                    {{ $icon->display_name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <div id="iconPreview"></div>

                                    </div>
                                    <span class="hint-text">Select icon from the list.</span>
                                    @error('icon')
                                        <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                                    @enderror
                                </div> --}}

                                <!-- Is Active Toggle -->
                                {{-- <div class="form-group full-width">
                                    <label>Status</label>
                                    <div class="toggle-group">
                                        <div class="toggle-label-wrap">
                                            <span class="toggle-label">Active</span>
                                            <span class="toggle-hint">Enable this item to be shown in the sidebar
                                                navigation.</span>
                                        </div>
                                        <label class="toggle">
                                            <input type="checkbox" name="is_active" id="is_active" checked>
                                            <div class="toggle-track"></div>
                                            <div class="toggle-thumb"></div>
                                        </label>
                                    </div>
                                </div> --}}

                            </div>


                            <div class="form-actions">
                                <button type="submit" class="btn-accent">
                                    <svg width="14" height="14" fill="none" stroke="currentColor"
                                        stroke-width="2.5" viewBox="0 0 24 24">
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Create Item
                                </button>

                            </div>
                        </form>

                    </div>
                </div>

            </main>
        </div>

    </div>

    <x-script />

</body>

</html>
