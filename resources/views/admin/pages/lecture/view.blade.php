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

    /* ── Main Panel ── */
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

    .search-box {
        display: flex;
        align-items: center;
        gap: 8px;
        background: var(--paper);
        border: 1.5px solid var(--border);
        border-radius: 10px;
        padding: 8px 14px;
        font-size: 13px;
        color: var(--muted);
        transition: border-color .2s;
    }

    .search-box:focus-within {
        border-color: var(--ink);
        background: #fff;
    }

    .search-box input {
        background: none;
        border: none;
        outline: none;
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        color: var(--ink);
        width: 160px;
    }

    .search-box input::placeholder {
        color: var(--muted);
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
        padding: 28px 32px;
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

    /* ── Stats Row ── */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 20px;
        animation: slideUp .45s cubic-bezier(0.22, 1, 0.36, 1) both;
        animation-delay: .05s;
    }

    .stat-card {
        border-radius: 14px;
        padding: 16px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sc-primary {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: #fff;
    }

    .sc-success {
        background: linear-gradient(135deg, #059669, #10b981);
        color: #fff;
    }

    .sc-info {
        background: linear-gradient(135deg, #0891b2, #06b6d4);
        color: #fff;
    }

    .sc-warning {
        background: linear-gradient(135deg, #d97706, #f59e0b);
        color: #fff;
    }

    .sc-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .sc-label {
        font-size: 11px;
        opacity: 0.85;
        margin-bottom: 2px;
    }

    .sc-val {
        font-family: "Syne", sans-serif;
        font-size: 18px;
        font-weight: 800;
    }

    .section-card {
        background: var(--surface);
        border-radius: 16px;
        border: 1px solid var(--border);
        margin-bottom: 16px;
        overflow: hidden;
    }

    .section-card::before {
        content: "";
        display: block;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--accent), transparent);
    }

    .section-title {
        font-family: "Syne", sans-serif;
        font-size: 14px;
        font-weight: 700;
        color: var(--ink);
    }

    .section-sub {
        font-size: 11px;
        color: var(--muted);
        margin-top: 2px;
    }

    .module-item {
        padding: 14px 20px;
        border-bottom: 1px solid var(--border);
    }

    .module-item:last-child {
        border-bottom: none;
    }

    .module-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .module-name {
        font-size: 13px;
        font-weight: 500;
        color: var(--ink);
    }

    .progress-pill {
        font-family: "Syne", sans-serif;
        font-size: 11px;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 20px;
    }

    .prog-bar-wrap {
        height: 10px;
        background: var(--paper);
        border-radius: 20px;
        overflow: hidden;
        margin-bottom: 6px;
    }

    .prog-bar {
        height: 100%;
        border-radius: 20px;
        transition: width 0.6s ease;
    }

    .section-header {
        padding: 16px 20px;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* Profile Card */
    .profile-card {
        background: var(--surface);
        border-radius: 18px;
        border: 1px solid var(--border);
        padding: 24px;
        display: flex;
        gap: 24px;
        margin-bottom: 18px;
    }

    .profile-left {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        min-width: 110px;
        border-right: 1px solid var(--border);
        padding-right: 20px;
    }

    .student-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
    }

    .stu-name {
        font-family: "Syne", sans-serif;
        font-size: 15px;
        font-weight: 700;
        color: var(--ink);
    }

    .stu-id {
        font-size: 11px;
        color: var(--muted);
    }

    .btn-sm {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 14px;
        border-radius: 9px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        border: none;
        font-family: "Syne", sans-serif;
        width: 100%;
        justify-content: center;
        margin-bottom: 6px;
    }

    .btn-pri {
        background: var(--ink);
        color: #fff;
    }

    .btn-war {
        background: #fff8e6;
        color: #a06e00;
        border: 1px solid #f5e2a2;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
        flex: 1;
    }

    .info-section h5 {
        font-family: "Syne", sans-serif;
        font-size: 14px;
        font-weight: 700;
        color: var(--ink);
        margin-bottom: 12px;
    }

    .info-row {
        display: flex;
        gap: 10px;
        margin-bottom: 10px;
        font-size: 12px;
    }

    .info-label {
        color: var(--muted);
        min-width: 90px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .info-val {
        color: var(--ink);
        font-weight: 500;
        word-break: break-word;
        max-width: 320px;
        text-align: justify;
        line-height: 1.5;
    }

    .status-active {
        background: #eafbe6;
        color: #3a7d22;
        font-size: 11px;
        padding: 3px 10px;
        border-radius: 20px;
        font-weight: 500;
    }

    .band-badge {
        display: inline-flex;
        align-items: center;
        padding: 3px 10px;
        background: rgba(200, 240, 78, .15);
        border: 1px solid rgba(200, 240, 78, .4);
        border-radius: 20px;
        font-family: 'Syne', sans-serif;
        font-size: 11px;
        font-weight: 700;
        color: #5a7a10;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 14px;
        border: 1.5px solid var(--border);
        border-radius: 9px;
        background: var(--paper);
        font-size: 12px;
        color: var(--muted);
        cursor: pointer;
        font-family: "DM Sans", sans-serif;
        text-decoration: none;
    }

    .back-btn:hover {
        background: #fff;
        color: var(--ink);
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

        .stats-row {
            grid-template-columns: 1fr 1fr;
        }
    }
</style>

<body>
    <div class="scene">

        <!-- ── Sidebar ── -->
        <aside class="sidebar">
            <div class="orb"></div>

            <div class="sidebar__logo">
                <div class="logo-text">Work<em>Smart</em></div>
            </div>

            <div class="sidebar__profile">
                <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
                <div class="profile-info">
                    <div class="profile-info__name text-capitalize">{{ auth()->user()->name }}</div>
                </div>
                <div class="online-dot"></div>
            </div>

            <x-sidebar />
        </aside>

        <!-- ── Main Panel ── -->
        <div class="main-panel">

            <!-- Topbar -->
            <header class="topbar">
                <div class="topbar__left">
                    <span class="topbar__eyebrow">Student Management</span>
                    <div class="topbar__title">
                        <div class="icon-badge">
                            <svg width="14" height="14" fill="none" stroke="var(--ink)" stroke-width="2.2"
                                viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                            </svg>
                        </div>
                        Student Profile
                    </div>
                </div>
                <div class="topbar__right">
                    <div class="search-box">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                        <input type="text" placeholder="Search students...">
                    </div>
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

            <!-- Content -->
            <main class="content">

                <!-- Back Button -->
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:18px;">
                    <div></div>
                    <a href="{{ route('lecture.index') }}" class="back-btn nav-link">
                        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                        Back to Students
                    </a>
                </div>


                <div class="section-card">

                    <!-- Top Row -->
                    <div
                        style="display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; padding:24px;">

                        <div>
                            <h2
                                style="font-size:22px; font-weight:700; margin-bottom:4px; text-transform: capitalize; ">
                                {{ $lecture->title }}
                            </h2>

                            <div style="display:flex; align-items:center; gap:10px;">
                                <span style="font-size:12px; color:#6b7280; text-transform: capitalize;">
                                    Module: {{ $lecture->module->name ?? 'N/A' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Video Card -->
                    <div
                        style="border-radius:16px; overflow:hidden; margin:24px;
        background:#000; box-shadow:0 8px 20px rgba(0,0,0,0.08);">

                        @if ($lecture->video_path)
                            <video controls style="width:100%; height:420px; object-fit:cover;">
                                <source src="{{ asset('storage/' . $lecture->video_path) }}" type="video/mp4">
                            </video>
                        @else
                            <div
                                style="height:300px; display:flex; align-items:center; justify-content:center; color:#aaa;">
                                No video available
                            </div>
                        @endif
                    </div>


                    <!-- Content Grid -->
                    <div style="display:grid; grid-template-columns: 2fr 1fr; gap:20px;">

                        <!-- Description -->
                        <div style="background:#f9fafb; padding:18px; border-radius:12px;">
                            <h4 style="font-size:15px; font-weight:600; margin-bottom:10px;">
                                📄 Description
                            </h4>

                            <p style="font-size:14px; color:#374151; line-height:1.7;">
                                {!! $lecture->description !!}
                                {{-- {{ $lecture->description  }} --}}
                            </p>
                        </div>

                        <!-- Meta Card -->
                        <div style="background:#fff; border:1px solid #eee; padding:18px; border-radius:12px;">
                            <h4 style="font-size:15px; font-weight:600; margin-bottom:12px;">
                                📊 Details
                            </h4>

                            <div style="font-size:13px; color:#6b7280; line-height:1.8;">

                                <div><strong>Created:</strong><br>
                                    {{ $lecture->created_at?->format('d M Y, h:i A') }}
                                </div>

                                <div><strong>Updated:</strong><br>
                                    {{ $lecture->updated_at?->format('d M Y, h:i A') }}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </main>
        </div>
    </div>

    <x-script />

    <script>
        function toggleStatus(id, currentStatus) {
            const action = currentStatus === 'active' ? 'Deactivate' : 'Activate';
            if (confirm(`Are you sure you want to ${action} this student?`)) {
                alert(`Student ${action}d successfully!`);
            }
        }

        function sendProgress(id) {
            if (confirm('Send progress report to student via email?')) {
                alert('Progress report sent successfully!');
            }
        }
    </script>
</body>

</html>
