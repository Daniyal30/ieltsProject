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
        width: 80px;
        height: 80px;
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
        /* ✅ Add these */
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
    }

    .back-btn:hover {
        background: #fff;
        color: var(--ink);
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

                <div
                    style="
          display: flex;
          align-items: center;
          justify-content: space-between;
          margin-bottom: 18px;
        ">
                    <div class="breadcrumb">
                        {{-- <a href="#">Dashboard</a>
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                        <a href="#">Students</a>
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                        <span>Profile</span> --}}
                    </div>
                    <a href="{{ route('student.index') }}" class="back-btn nav-link">
                        <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <polyline points="15 18 9 12 15 6" />
                        </svg>
                        Back to Students
                    </a>
                </div>

                <!-- Profile Card -->
                <div class="profile-card">
                    <div class="profile-left">
                        <div>
                            <img src="{{ asset('storage/' . $student->profile_image) }}" class="student-avatar"
                                alt="{{ $student->name }}">
                        </div>
                        <div class="stu-name" style="text-align: center">{{ $student->name }}</div>
                        <div class="stu-id">ID: STD001</div>
                        <span class="status-active">● Active</span>
                        <button class="btn-sm btn-pri" style="margin-top: 6px">
                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                <polyline points="22,6 12,13 2,6" />
                            </svg>
                            Send Report
                        </button>
                        <button class="btn-sm btn-war">
                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                            Deactivate
                        </button>
                    </div>
                    <div class="info-grid" style="flex: 1; padding-left: 20px">
                        <div class="info-section">
                            <h5>Personal Info</h5>
                            <div class="info-row">
                                <span class="info-label"><svg width="12" height="12" fill="none"
                                        stroke="#4f46e5" stroke-width="2" viewBox="0 0 24 24">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                        <polyline points="22,6 12,13 2,6" />
                                    </svg>
                                    Email</span><span class="info-val">{{ $student->email }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label"><svg width="12" height="12" fill="none"
                                        stroke="#4f46e5" stroke-width="2" viewBox="0 0 24 24">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 9a16 16 0 0 0 6 6l.9-.9a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                    </svg>
                                    Phone</span><span class="info-val">{{ $student->phone }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label"><svg width="12" height="12" fill="none"
                                        stroke="#4f46e5" stroke-width="2" viewBox="0 0 24 24">
                                        <rect x="3" y="4" width="18" height="18" rx="2" />
                                        <line x1="16" y1="2" x2="16" y2="6" />
                                        <line x1="8" y1="2" x2="8" y2="6" />
                                        <line x1="3" y1="10" x2="21" y2="10" />
                                    </svg>
                                    DOB</span><!-- Format: 09-04-2026 -->
                                <span
                                    class="info-val">{{ \Carbon\Carbon::parse($student->date_of_birth)->format('d-m-Y') }}</span>

                            </div>
                            <div class="info-row">
                                <span class="info-label"><svg width="12" height="12" fill="none"
                                        stroke="#4f46e5" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                    Gender</span><span class="info-val text-capitalize">{{ $student->gender }}</span>
                            </div>
                        </div>
                        <div class="info-section" style="padding-left: 20px; border-left: 1px solid var(--border)">
                            <h5>Course Info</h5>
                            <div class="info-row" style="align-items: flex-start;">
                                <span class="info-label"><svg width="12" height="12" fill="none"
                                        stroke="#4f46e5" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                        <circle cx="12" cy="10" r="3" />
                                    </svg>
                                    Address</span><span class="info-val">{{ $student->address }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label"><svg width="12" height="12" fill="none"
                                        stroke="#4f46e5" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z" />
                                        <line x1="4" y1="22" x2="4" y2="15" />
                                    </svg>
                                    Target Band</span><span
                                    class="band-badge">{{ $student->target_band_score }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-label"><svg width="12" height="12" fill="none"
                                        stroke="#4f46e5" stroke-width="2" viewBox="0 0 24 24">
                                        <rect x="3" y="4" width="18" height="18" rx="2" />
                                        <line x1="16" y1="2" x2="16" y2="6" />
                                        <line x1="8" y1="2" x2="8" y2="6" />
                                        <line x1="3" y1="10" x2="21" y2="10" />
                                    </svg>
                                    Enrolled</span><span
                                    class="info-val">{{ \Carbon\Carbon::parse($student->created_at)->format('d-m-Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Row -->
                <div class="stats-row">
                    <div class="stat-card sc-primary">
                        <div class="sc-icon">
                            <svg width="18" height="18" fill="none" stroke="#fff" stroke-width="2"
                                viewBox="0 0 24 24">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                            </svg>
                        </div>
                        <div>
                            <div class="sc-label">Overall Progress</div>
                            <div class="sc-val">72%</div>
                        </div>
                    </div>
                    <div class="stat-card sc-success">
                        <div class="sc-icon">
                            <svg width="18" height="18" fill="none" stroke="#fff" stroke-width="2"
                                viewBox="0 0 24 24">
                                <polygon points="23 7 16 12 23 17 23 7" />
                                <rect x="1" y="5" width="15" height="14" rx="2" />
                            </svg>
                        </div>
                        <div>
                            <div class="sc-label">Lectures Done</div>
                            <div class="sc-val">36/50</div>
                        </div>
                    </div>
                    <div class="stat-card sc-info">
                        <div class="sc-icon">
                            <svg width="18" height="18" fill="none" stroke="#fff" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                            </svg>
                        </div>
                        <div>
                            <div class="sc-label">Assignments</div>
                            <div class="sc-val">8/12</div>
                        </div>
                    </div>
                    <div class="stat-card sc-warning">
                        <div class="sc-icon">
                            <svg width="18" height="18" fill="none" stroke="#fff" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 21 12 17.77 5.82 21 7 14.14l-5-4.87 6.91-1.01L12 2z" />
                            </svg>
                        </div>
                        <div>
                            <div class="sc-label">Average Score</div>
                            <div class="sc-val">78%</div>
                        </div>
                    </div>
                </div>

                <!-- Module Progress -->
                <div class="section-card"
                    style="border-radius:16px; background:#fff; box-shadow:0 10px 25px rgba(0,0,0,0.05);">

                    <div class="section-header" style="margin-bottom:15px;">
                        <div>
                            <div class="section-title" style="font-size:18px; font-weight:600;">
                                Course Progress Details
                            </div>
                            <div class="section-sub" style="color:#6b7280; font-size:13px;">
                                Last activity: {{ $lastActivity ?? 'No activity yet' }}
                            </div>
                        </div>
                    </div>

                    @if (isset($modules) && count($modules) > 0)

                        @foreach ($modules as $module)
                            <div class="module-item"
                                style="padding:15px 0; transition:0.3s; {{ $loop->last ? '' : 'border-bottom:1px solid #f1f5f9;' }}"
                                onmouseover="this.style.transform='translateY(-2px)'"
                                onmouseout="this.style.transform='translateY(0)'">

                                <div class="module-header"
                                    style="display:flex; justify-content:space-between; align-items:center;">
                                    <span class="module-name" style="font-weight:500;">
                                        {{ $module->name }}
                                    </span>

                                    <span class="progress-pill"
                                        style="padding:4px 10px; border-radius:999px; font-size:12px;
                               background: {{ $module->bg_color }};
                               color: {{ $module->text_color }};">
                                        {{ $module->progress }}%
                                    </span>
                                </div>

                                <div class="prog-bar-wrap"
                                    style="height:8px; background:#f1f5f9; border-radius:999px; margin:10px 0; overflow:hidden;">

                                    <div class="prog-bar"
                                        style="height:100%;
                                width: {{ $module->progress }}%;
                                background: {{ $module->gradient }};
                                border-radius:999px;
                                transition: width 0.6s ease;">
                                    </div>
                                </div>

                                <div class="prog-meta"
                                    style="display:flex; justify-content:space-between; font-size:12px; color:#6b7280;">
                                    <span>Lectures: {{ $module->completed }}/{{ $module->total }}</span>
                                    <span>Avg Score: {{ $module->avg_score }}%</span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- 🔥 Attractive Empty State -->
                        <div style="text-align:center; padding:40px 20px;">

                            <div style="font-size:40px; margin-bottom:10px;">📊</div>

                            <p style="font-weight:500; margin-bottom:5px;">
                                No progress data yet
                            </p>

                            <p style="font-size:13px; color:#9ca3af;">
                                Start learning to see your progress here
                            </p>

                        </div>
                    @endif

                </div>

                <!-- Assignment History -->
                <div class="section-card"
                    style="border-radius:16px; background:#fff; box-shadow:0 10px 25px rgba(0,0,0,0.05);">

                    <div class="section-header"
                        style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
                        <div>
                            <div class="section-title" style="font-size:18px; font-weight:600;">
                                Assignment History
                            </div>
                            <div class="section-sub" style="color:#6b7280; font-size:13px;">
                                All submitted assignments
                            </div>
                        </div>

                        <span
                            style="background:rgba(200,240,78,0.15); border:1px solid rgba(200,240,78,0.4);
                     border-radius:20px; font-size:11px; font-weight:700;
                     color:#5a7a10; padding:4px 12px;">
                            {{-- Total: {{ $assignments->count() ?? 0 }} --}}
                        </span>
                    </div>

                    @if (isset($assignments) && count($assignments) > 0)

                        <div style="overflow-x:auto;">
                            <table style="width:100%; border-collapse:collapse; font-size:13px;">

                                <thead>
                                    <tr style="text-align:left; color:#6b7280; border-bottom:1px solid #f1f5f9;">
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Module</th>
                                        <th>Submitted</th>
                                        <th>Score</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($assignments as $index => $item)
                                        <tr style="border-bottom:1px solid #f8fafc; transition:0.2s;"
                                            onmouseover="this.style.background='#f9fafb'"
                                            onmouseout="this.style.background='transparent'">

                                            <td style="color:#9ca3af;">{{ $index + 1 }}</td>

                                            <td style="font-weight:500;">
                                                {{ $item->title }}
                                            </td>

                                            <td>
                                                <span
                                                    style="background:#eef2ff; color:#4f46e5; padding:3px 8px; border-radius:6px; font-size:11px;">
                                                    {{ $item->module }}
                                                </span>
                                            </td>

                                            <td style="color:#9ca3af;">
                                                {{ \Carbon\Carbon::parse($item->submitted_at)->format('d M Y') }}
                                            </td>

                                            <td>
                                                @php
                                                    $scoreClass =
                                                        $item->score >= 75
                                                            ? '#16a34a'
                                                            : ($item->score >= 50
                                                                ? '#f59e0b'
                                                                : '#ef4444');
                                                @endphp
                                                <span
                                                    style="color:white; background:{{ $scoreClass }};
                                             padding:3px 8px; border-radius:6px; font-size:11px;">
                                                    {{ $item->score }}%
                                                </span>
                                            </td>

                                            <td>
                                                @if ($item->status == 'graded')
                                                    <span style="color:#16a34a; font-size:12px;">● Graded</span>
                                                @else
                                                    <span style="color:#f59e0b; font-size:12px;">● Pending</span>
                                                @endif
                                            </td>

                                            <td>
                                                <button style="padding:6px; border-radius:6px; transition:0.2s;"
                                                    onmouseover="this.style.background='#f1f5f9'"
                                                    onmouseout="this.style.background='transparent'">
                                                    👁️
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    @else
                        <!-- 🔥 Attractive Empty State -->
                        <div style="text-align:center; padding:40px 20px;">

                            <div style="font-size:40px; margin-bottom:10px;">📝</div>

                            <p style="font-weight:500; margin-bottom:5px;">
                                No assignments yet
                            </p>

                            <p style="font-size:13px; color:#9ca3af;">
                                Submit your first assignment to see history here
                            </p>

                        </div>
                    @endif

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
