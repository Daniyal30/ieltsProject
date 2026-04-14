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

    /* ── Page Header ── */
    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
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

    /* ── Stats Row ── */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 20px;
        animation: slideUp .45s cubic-bezier(0.22, 1, 0.36, 1) both;
        animation-delay: .05s;
    }

    .mini-stat {
        background: var(--surface);
        border-radius: 14px;
        padding: 16px 18px;
        border: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .mini-stat__icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .mini-stat__icon.accent {
        background: rgba(200, 240, 78, .15);
    }

    .mini-stat__icon.green {
        background: #eafbe6;
    }

    .mini-stat__icon.yellow {
        background: #fff8e6;
    }

    .mini-stat__icon.blue {
        background: #e8f0fe;
    }

    .mini-stat__val {
        font-family: sans-serif;
        font-size: 20px;
        font-weight: 800;
        color: var(--ink);
    }

    .mini-stat__label {
        font-size: 11px;
        color: var(--muted);
        margin-top: 1px;
    }

    /* ── Filter Bar ── */
    .filter-bar {
        background: var(--surface);
        border-radius: 14px;
        border: 1px solid var(--border);
        padding: 16px 20px;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        animation: slideUp .45s cubic-bezier(0.22, 1, 0.36, 1) both;
        animation-delay: .07s;
    }

    .filter-bar form {
        display: flex;
        align-items: center;
        gap: 12px;
        flex: 1;
        flex-wrap: wrap;
    }

    .filter-input {
        flex: 1;
        min-width: 160px;
        padding: 9px 14px;
        border: 1.5px solid var(--border);
        border-radius: 9px;
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        color: var(--ink);
        background: var(--paper);
        outline: none;
        transition: border-color .2s;
    }

    .filter-input:focus {
        border-color: var(--ink);
        background: #fff;
    }

    .filter-input::placeholder {
        color: var(--muted);
    }

    .filter-select {
        padding: 9px 32px 9px 12px;
        border: 1.5px solid var(--border);
        border-radius: 9px;
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        color: var(--ink);
        background: var(--paper);
        outline: none;
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg width='10' height='10' fill='none' stroke='%238a8a96' stroke-width='2' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        transition: border-color .2s;
    }

    .filter-select:focus {
        border-color: var(--ink);
    }

    .btn-accent {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 18px;
        background: var(--accent);
        color: var(--ink);
        border: none;
        border-radius: 9px;
        font-family: 'Syne', sans-serif;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: background .2s, transform .15s;
        text-decoration: none;
    }

    .btn-accent:hover {
        color: var(--ink);
        background: var(--accent-dark);
        transform: translateY(-1px);
    }

    .btn-reset {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 9px 16px;
        background: transparent;
        color: var(--muted);
        border: 1.5px solid var(--border);
        border-radius: 9px;
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        cursor: pointer;
        transition: background .15s, color .15s;
        text-decoration: none;
    }

    .btn-reset:hover {
        background: var(--paper);
        color: var(--ink);
    }

    /* ── Table Card ── */
    .table-card {
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

    .table-card::before {
        content: '';
        display: block;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--accent), transparent);
    }

    .table-toolbar {
        padding: 20px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid var(--border);
        gap: 12px;
    }

    .table-toolbar__title {
        font-family: 'Syne', sans-serif;
        font-size: 15px;
        font-weight: 700;
        color: var(--ink);
    }

    .table-toolbar__sub {
        font-size: 12px;
        color: var(--muted);
        margin-top: 2px;
    }

    /* ── Data Table ── */
    .data-table-wrap {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead th {
        font-size: 10px;
        font-weight: 500;
        letter-spacing: .12em;
        text-transform: uppercase;
        color: var(--muted);
        padding: 12px 16px;
        text-align: left;
        background: var(--paper);
        border-bottom: 1px solid var(--border);
        white-space: nowrap;
    }

    thead th:first-child {
        padding-left: 24px;
    }

    thead th:last-child {
        padding-right: 24px;
        text-align: right;
    }

    tbody td {
        font-size: 13px;
        color: var(--ink);
        padding: 13px 16px;
        border-bottom: 1px solid var(--border);
        vertical-align: middle;
    }

    tbody td:first-child {
        padding-left: 24px;
    }

    tbody td:last-child {
        padding-right: 24px;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }

    tbody tr {
        transition: background .12s;
    }

    tbody tr:hover {
        background: #fafaf8;
    }

    /* Student Avatar */
    .student-avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        object-fit: cover;
    }

    .student-name {
        font-size: 13px;
        font-weight: 500;
        color: var(--ink);
    }

    .student-id {
        font-size: 11px;
        color: var(--muted);
        margin-top: 1px;
    }

    /* Band badge */
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

    /* Status pill */
    .status-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 500;
    }

    .status-pill::before {
        content: '';
        width: 5px;
        height: 5px;
        border-radius: 50%;
    }

    .status-pill.active {
        background: #eafbe6;
        color: #3a7d22;
    }

    .status-pill.active::before {
        background: #3a7d22;
    }

    .status-pill.inactive {
        background: #fce8e8;
        color: #b02a2a;
    }

    .status-pill.inactive::before {
        background: #b02a2a;
    }

    /* Action buttons */
    .action-group {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 6px;
    }

    .act-btn {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        border: 1.5px solid var(--border);
        background: var(--paper);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background .15s, border-color .15s;
        text-decoration: none;
    }

    .act-btn:hover {
        background: #fff;
        border-color: #ccc;
    }

    .act-btn.view:hover {
        background: #e8f0fe;
        border-color: #c2d4f8;
    }

    .act-btn.view:hover svg {
        stroke: #1a56b0;
    }

    .act-btn.lock:hover {
        background: #fff8e6;
        border-color: #f5e2a2;
    }

    .act-btn.lock:hover svg {
        stroke: #a06e00;
    }

    .act-btn.mail:hover {
        background: rgba(200, 240, 78, .15);
        border-color: rgba(200, 240, 78, .4);
    }

    .act-btn.mail:hover svg {
        stroke: #5a7a10;
    }

    /* ── Pagination ── */
    .pagination-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 24px;
        border-top: 1px solid var(--border);
    }

    .pagination-info {
        font-size: 12px;
        color: var(--muted);
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
                    <span class="topbar__eyebrow">Batch Management</span>
                    <div class="topbar__title">
                        <div class="icon-badge">
                            <svg width="14" height="14" fill="none" stroke="var(--ink)" stroke-width="2"
                                viewBox="0 0 24 24">
                                <polygon points="12 2 2 7 12 12 22 7 12 2" />
                                <polyline points="2 17 12 22 22 17" />
                                <polyline points="2 12 12 17 22 12" />
                            </svg>
                        </div>
                        All Batches
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

                <!-- Page Header -->
                <div class="page-header">
                    <div class="page-header__left">
                        <h1>Batch Management</h1>
                        <p>View and edit all student records</p>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px;">
                        <div class="breadcrumb">
                            <a href="{{ route('admin.index') }}">Dashboard</a>
                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <polyline points="9 18 15 12 9 6" />
                            </svg>
                            <span>Batch</span>
                        </div>
                        <a href="{{ route('batch.create') }}" class="btn-accent">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Add New
                        </a>
                    </div>
                </div>

                <!-- Filter Bar -->
                <div class="filter-bar">
                    <form action="{{ route('student.index') }}" method="get"
                        style="display:flex;align-items:center;gap:12px;flex:1;flex-wrap:wrap;">
                        @csrf
                        <input type="text" class="filter-input" name="search" placeholder="Search by name..."
                            value="{{ request('search') }}">
                        <select class="filter-select" name="is_active">
                            <option value="">All Status</option>
                            <option value="0" {{ request('status') == 'active' ? 'selected' : '' }}>Active
                            </option>
                            <option value="1" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive
                            </option>
                        </select>

                        <button type="submit" class="btn-accent">
                            <svg width="13" height="13" fill="none" stroke="currentColor"
                                stroke-width="2.5" viewBox="0 0 24 24">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                            </svg>
                            Filter
                        </button>
                        <a href="{{ route('student.index') }}" class="btn-reset">
                            <svg width="13" height="13" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <polyline points="1 4 1 10 7 10" />
                                <path d="M3.51 15a9 9 0 1 0 .49-3.5" />
                            </svg>
                            Reset
                        </a>
                    </form>
                </div>

                @if (session('success'))
                    <div class="alert-success" id="successAlert">
                        <div class="alert-icon">
                            <svg width="16" height="16" fill="none" stroke="currentColor"
                                stroke-width="2.5" viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                        </div>
                        <span>{{ session('success') }}</span>
                        <button onclick="document.getElementById('successAlert').style.display='none'"
                            class="alert-close">
                            <svg width="14" height="14" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                    </div>
                @endif

                <!-- Table Card -->
                <div class="table-card">

                    <div class="table-toolbar">
                        <div>
                            <div class="table-toolbar__title"></div>
                            {{-- <div class="table-toolbar__sub">
                                Showing {{ $users->firstItem() ?? 0 }}–{{ $users->lastItem() ?? 0 }}
                                of {{ $users->total() }} students
                            </div> --}}
                        </div>
                    </div>

                    <div class="data-table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Days</th>
                                    <th>max students</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @php $i = 0; @endphp
                                @forelse ($users as $user)
                                    <tr>
                                        <td style="color:var(--muted);font-size:12px;">{{ ++$i }}</td>

                                        <td>
                                            <div style="display:flex;align-items:center;gap:10px;">
                                                <img src="{{ asset('storage/' . $user->profile_image) }}"
                                                    class="student-avatar" alt="{{ $user->name }}">
                                                <div>
                                                    <div class="student-name">{{ $user->name }}</div>
                                                    <div class="student-id">ID: STD00{{ $i }}</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div style="font-size:12px;color:var(--muted);line-height:1.7;">
                                                <div>{{ $user->email }}</div>
                                                <div>{{ $user->phone }}</div>
                                            </div>
                                        </td>

                                        <td>
                                            <span class="band-badge">{{ $user->target_band_score }}</span>
                                        </td>

                                        <td style="font-size:12px;color:var(--muted);">
                                            {{ $user->created_at->format('d M Y') }}
                                        </td>

                                        <td>
                                            @if ($user->is_active == 0)
                                                <span class="status-pill active">Active</span>
                                            @else
                                                <span class="status-pill inactive">Inactive</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="action-group">

                                                <a href="{{ route('student.show', $user->id) }}" class="act-btn view"
                                                    title="View Details">
                                                    <svg width="13" height="13" fill="none" stroke="var(--muted)"
                                                        stroke-width="2" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                        <circle cx="12" cy="12" r="3" />
                                                    </svg>
                                                </a>


                                                <button type="button" class="act-btn lock"
                                                    title="{{ $user->is_active == 0 ? 'Deactivate' : 'Activate' }}"
                                                    onclick="toggleStatus({{ $user->id }}, '{{ $user->is_active == 0 ? 'active' : 'inactive' }}')">
                                                    <svg width="13" height="13" fill="none" stroke="var(--muted)"
                                                        stroke-width="2" viewBox="0 0 24 24">
                                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                                    </svg>
                                                </button>


                                                <button type="button" class="act-btn mail" title="Send Progress Report"
                                                    onclick="sendProgress({{ $user->id }})">
                                                    <svg width="13" height="13" fill="none" stroke="var(--muted)"
                                                        stroke-width="2" viewBox="0 0 24 24">
                                                        <path
                                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                                        <polyline points="22,6 12,13 2,6" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" style="text-align:center;padding:3rem;color:var(--muted);">
                                            No students found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody> --}}
                        </table>
                    </div>

                    <!-- Pagination -->
                    {{-- <div class="pagination-bar">
                        <div class="pagination-info">
                            Showing {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }}
                            of {{ $users->total() }} students
                        </div>
                        <div>
                            {{ $users->links() }}
                        </div>
                    </div> --}}

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
