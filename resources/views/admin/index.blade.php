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

    /* Glowing orb — same as login page */
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

    /* Logo */
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

    /* Profile block */
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

    /* Nav */
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

    /* Sidebar footer */
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
        box-shadow: 0 1px 0 var(--border);
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

    /* Content area */
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

    /* ── Stat Cards ── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }

    .stat-card {
        border-radius: 20px;
        padding: 26px 24px;
        position: relative;
        overflow: hidden;
        animation: slideUp .5s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    .stat-card:nth-child(1) {
        animation-delay: .05s;
    }

    .stat-card:nth-child(2) {
        animation-delay: .12s;
    }

    .stat-card:nth-child(3) {
        animation-delay: .19s;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-card.danger {
        background: #150909;
        border: 1px solid rgba(220, 80, 80, .2);
    }

    .stat-card.info {
        background: #060c18;
        border: 1px solid rgba(55, 138, 221, .2);
    }

    .stat-card.success {
        background: #060f07;
        border: 1px solid rgba(99, 153, 34, .2);
    }

    /* Grid lines inside cards */
    .stat-card::after {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(255, 255, 255, .025) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, .025) 1px, transparent 1px);
        background-size: 28px 28px;
        pointer-events: none;
    }

    .stat-card__orb {
        position: absolute;
        width: 130px;
        height: 130px;
        border-radius: 50%;
        bottom: -30px;
        right: -30px;
        pointer-events: none;
    }

    .stat-card.danger .stat-card__orb {
        background: radial-gradient(circle, rgba(220, 80, 80, .22) 0%, transparent 70%);
    }

    .stat-card.info .stat-card__orb {
        background: radial-gradient(circle, rgba(55, 138, 221, .22) 0%, transparent 70%);
    }

    .stat-card.success .stat-card__orb {
        background: radial-gradient(circle, rgba(99, 153, 34, .22) 0%, transparent 70%);
    }

    .stat-card__label {
        font-size: 11px;
        font-weight: 500;
        letter-spacing: .08em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, .4);
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        z-index: 1;
    }

    .stat-card__value {
        font-family: 'Syne', sans-serif;
        font-size: 32px;
        font-weight: 800;
        color: #fff;
        margin-bottom: 8px;
        position: relative;
        z-index: 1;
    }

    .stat-card__change {
        font-size: 12px;
        position: relative;
        z-index: 1;
    }

    .stat-card.danger .stat-card__change {
        color: rgba(255, 100, 100, .8);
    }

    .stat-card.info .stat-card__change {
        color: rgba(55, 138, 221, .8);
    }

    .stat-card.success .stat-card__change {
        color: var(--accent);
    }

    /* ── Bottom grid ── */
    .bottom-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .panel {
        background: var(--surface);
        border-radius: 20px;
        border: 0 solid transparent;
        box-shadow:
            0 1px 2px rgba(0, 0, 0, .05),
            0 4px 20px rgba(0, 0, 0, .06),
            0 0 0 1px var(--border);
        overflow: hidden;
        animation: slideUp .55s cubic-bezier(0.22, 1, 0.36, 1) both;
        animation-delay: .25s;
    }

    /* Accent stripe — same as login card */
    .panel::before {
        content: '';
        display: block;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--accent), transparent);
    }

    .panel__inner {
        padding: 24px;
    }

    .panel__header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .panel__title {
        font-family: 'Syne', sans-serif;
        font-size: 15px;
        font-weight: 700;
        color: var(--ink);
    }

    .panel__sub {
        font-size: 12px;
        color: var(--muted);
        margin-top: 3px;
    }

    .panel__badge {
        font-size: 11px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 20px;
        background: rgba(200, 240, 78, .15);
        color: #5a7a10;
        font-family: 'Syne', sans-serif;
    }

    /* Table */
    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th {
        font-size: 10px;
        font-weight: 500;
        letter-spacing: .1em;
        text-transform: uppercase;
        color: var(--muted);
        padding: 0 0 12px;
        text-align: left;
        border-bottom: 1px solid var(--border);
    }

    .data-table td {
        font-size: 13px;
        color: var(--ink);
        padding: 11px 0;
        border-bottom: 1px solid var(--border);
        vertical-align: middle;
    }

    .data-table tr:last-child td {
        border-bottom: none;
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 3px 10px;
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

    .status-pill.pending {
        background: #fff8e6;
        color: #a06e00;
    }

    .status-pill.pending::before {
        background: #a06e00;
    }

    .status-pill.done {
        background: #e8f0fe;
        color: #1a56b0;
    }

    .status-pill.done::before {
        background: #1a56b0;
    }

    /* Activity */
    .activity-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 11px 0;
        border-bottom: 1px solid var(--border);
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .activity-icon.green {
        background: #eafbe6;
    }

    .activity-icon.blue {
        background: #e8f0fe;
    }

    .activity-icon.yellow {
        background: #fff8e6;
    }

    .activity-icon.red {
        background: #fce8e8;
    }

    .activity-info__title {
        font-size: 13px;
        font-weight: 500;
        color: var(--ink);
    }

    .activity-info__time {
        font-size: 11px;
        color: var(--muted);
        margin-top: 2px;
    }

    /* ── Responsive ── */
    @media (max-width: 1024px) {
        .scene {
            grid-template-columns: 220px 1fr;
        }

        .stats-grid {
            grid-template-columns: 1fr 1fr;
        }

        .stat-card:nth-child(3) {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 768px) {
        .scene {
            grid-template-columns: 1fr;
        }

        .sidebar {
            display: none;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .bottom-grid {
            grid-template-columns: 1fr;
        }

        .stat-card:nth-child(3) {
            grid-column: auto;
        }

        .content {
            padding: 20px 16px;
        }

        .topbar {
            padding: 0 16px;
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
                    <span class="topbar__eyebrow">Overview</span>
                    <div class="topbar__title">
                        <div class="icon-badge">
                            <svg width="14" height="14" fill="none" stroke="var(--ink)" stroke-width="2.2"
                                viewBox="0 0 24 24">
                                <rect x="3" y="3" width="7" height="7" rx="1" />
                                <rect x="14" y="3" width="7" height="7" rx="1" />
                                <rect x="3" y="14" width="7" height="7" rx="1" />
                                <rect x="14" y="14" width="7" height="7" rx="1" />
                            </svg>
                        </div>
                        Dashboard
                    </div>
                </div>
                <div class="topbar__right">
                    <div class="search-box">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                        <input type="text" placeholder="Search projects...">
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

                <!-- Stat Cards -->
                <div class="stats-grid">
                    <div class="stat-card danger">
                        <div class="stat-card__orb"></div>
                        <div class="stat-card__label">
                            Weekly Sales
                            <svg width="16" height="16" fill="none" stroke="rgba(220,80,80,.5)" stroke-width="2"
                                viewBox="0 0 24 24">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                                <polyline points="17 6 23 6 23 12" />
                            </svg>
                        </div>
                        <div class="stat-card__value">$ 15,000</div>
                        <div class="stat-card__change">↑ Increased by 60%</div>
                    </div>

                    <div class="stat-card info">
                        <div class="stat-card__orb"></div>
                        <div class="stat-card__label">
                            Weekly Orders
                            <svg width="16" height="16" fill="none" stroke="rgba(55,138,221,.5)" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path
                                    d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z" />
                                <line x1="7" y1="7" x2="7.01" y2="7" />
                            </svg>
                        </div>
                        <div class="stat-card__value">45,633</div>
                        <div class="stat-card__change">↓ Decreased by 10%</div>
                    </div>

                    <div class="stat-card success">
                        <div class="stat-card__orb"></div>
                        <div class="stat-card__label">
                            Visitors Online
                            <svg width="16" height="16" fill="none" stroke="rgba(99,153,34,.5)" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                        </div>
                        <div class="stat-card__value">95,574</div>
                        <div class="stat-card__change">↑ Increased by 5%</div>
                    </div>
                </div>

                <!-- Bottom Panels -->
                <div class="bottom-grid">

                    <!-- Recent Projects Table -->
                    <div class="panel">
                        <div class="panel__inner">
                            <div class="panel__header">
                                <div>
                                    <div class="panel__title">Recent Projects</div>
                                    <div class="panel__sub">Last 5 active projects</div>
                                </div>
                                <span class="panel__badge">Live</span>
                            </div>
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>Project</th>
                                        <th>Client</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Dashboard UI</td>
                                        <td style="color:var(--muted)">Acme Corp</td>
                                        <td><span class="status-pill active">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile App</td>
                                        <td style="color:var(--muted)">TechVault</td>
                                        <td><span class="status-pill pending">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>API Integration</td>
                                        <td style="color:var(--muted)">DataFlow</td>
                                        <td><span class="status-pill done">Done</span></td>
                                    </tr>
                                    <tr>
                                        <td>CMS Redesign</td>
                                        <td style="color:var(--muted)">MediaLab</td>
                                        <td><span class="status-pill active">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td>E-Commerce Portal</td>
                                        <td style="color:var(--muted)">ShopCo</td>
                                        <td><span class="status-pill pending">Pending</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Activity Log -->
                    <div class="panel">
                        <div class="panel__inner">
                            <div class="panel__header">
                                <div>
                                    <div class="panel__title">Activity Log</div>
                                    <div class="panel__sub">Latest actions today</div>
                                </div>
                            </div>

                            <div class="activity-item">
                                <div class="activity-icon green">
                                    <svg width="14" height="14" fill="none" stroke="#3a7d22" stroke-width="2.2"
                                        viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                </div>
                                <div class="activity-info">
                                    <div class="activity-info__title">Dashboard deployed successfully</div>
                                    <div class="activity-info__time">2 minutes ago</div>
                                </div>
                            </div>

                            <div class="activity-item">
                                <div class="activity-icon blue">
                                    <svg width="14" height="14" fill="none" stroke="#1a56b0" stroke-width="2.2"
                                        viewBox="0 0 24 24">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <line x1="19" y1="8" x2="19" y2="14" />
                                        <line x1="22" y1="11" x2="16" y2="11" />
                                    </svg>
                                </div>
                                <div class="activity-info">
                                    <div class="activity-info__title">New user registered</div>
                                    <div class="activity-info__time">15 minutes ago</div>
                                </div>
                            </div>

                            <div class="activity-item">
                                <div class="activity-icon yellow">
                                    <svg width="14" height="14" fill="none" stroke="#a06e00" stroke-width="2.2"
                                        viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <line x1="12" y1="8" x2="12" y2="12" />
                                        <line x1="12" y1="16" x2="12.01" y2="16" />
                                    </svg>
                                </div>
                                <div class="activity-info">
                                    <div class="activity-info__title">Pending review: Mobile App</div>
                                    <div class="activity-info__time">1 hour ago</div>
                                </div>
                            </div>

                            <div class="activity-item">
                                <div class="activity-icon green">
                                    <svg width="14" height="14" fill="none" stroke="#3a7d22" stroke-width="2.2"
                                        viewBox="0 0 24 24">
                                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                                    </svg>
                                </div>
                                <div class="activity-info">
                                    <div class="activity-info__title">Weekly sales report generated</div>
                                    <div class="activity-info__time">3 hours ago</div>
                                </div>
                            </div>

                            <div class="activity-item">
                                <div class="activity-icon red">
                                    <svg width="14" height="14" fill="none" stroke="#b02a2a" stroke-width="2.2"
                                        viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" />
                                        <line x1="15" y1="9" x2="9" y2="15" />
                                        <line x1="9" y1="9" x2="15" y2="15" />
                                    </svg>
                                </div>
                                <div class="activity-info">
                                    <div class="activity-info__title">API Integration: build failed</div>
                                    <div class="activity-info__time">5 hours ago</div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </main>
        </div>

    </div>

    <x-script />
</body>

</html>
