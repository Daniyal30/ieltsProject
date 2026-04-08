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

    .modal-overlay {
        pointer-events: none;
        /* ← yahi problem hai */
        opacity: 0;
    }

    .modal-overlay.open {
        opacity: 1;
        pointer-events: all;
        /* sirf open hone par clickable hota hai */
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

    /* ── Btn ── */
    .btn-accent {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: var(--accent);
        color: var(--ink);
        border: none;
        border-radius: 11px;
        font-family: 'Syne', sans-serif;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: background .2s, transform .15s;
        text-decoration: none;
    }

    .btn-accent:hover {
        background: var(--accent-dark);
        color: var(--ink);
        transform: translateY(-1px);
    }

    /* ── Stats Row ── */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
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

    .alert-success {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #eafbe6;
        border: 1px solid #b6e8a8;
        border-left: 4px solid #3a7d22;
        border-radius: 12px;
        padding: 14px 18px;
        margin-bottom: 20px;
        font-size: 13px;
        color: #2a5c18;
        animation: slideUp .4s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    .alert-icon {
        width: 28px;
        height: 28px;
        background: #3a7d22;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .alert-icon svg {
        stroke: #fff;
    }

    .alert-close {
        margin-left: auto;
        background: none;
        border: none;
        color: #3a7d22;
        cursor: pointer;
        padding: 2px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        opacity: 0.6;
        transition: opacity .15s;
    }

    .alert-close:hover {
        opacity: 1;
    }

    .mini-stat__icon.green {
        background: #eafbe6;
    }

    .mini-stat__icon.blue {
        background: #e8f0fe;
    }

    .mini-stat__icon.yellow {
        background: #fff8e6;
    }

    .mini-stat__icon.accent {
        background: rgba(200, 240, 78, .15);
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

    .table-toolbar__left {
        display: flex;
        flex-direction: column;
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

    .table-toolbar__right {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .filter-select {
        padding: 8px 32px 8px 12px;
        border: 1.5px solid var(--border);
        border-radius: 9px;
        font-family: 'DM Sans', sans-serif;
        font-size: 12px;
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
        border-radius: 0;
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

    /* Order badge */
    .order-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 26px;
        height: 26px;
        background: var(--paper);
        border: 1.5px solid var(--border);
        border-radius: 7px;
        font-family: 'Syne', sans-serif;
        font-size: 12px;
        font-weight: 700;
        color: var(--ink);
    }

    /* Icon chip */
    .icon-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 3px 8px;
        background: var(--paper);
        border: 1px solid var(--border);
        border-radius: 7px;
        font-size: 15px;
        color: var(--muted);
        font-family: 'DM Sans', sans-serif;
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

    /* URL cell */
    .url-cell {
        font-size: 12px;
        color: var(--muted);
        font-family: 'DM Sans', sans-serif;
        max-width: 160px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
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
    }

    .act-btn:hover {
        background: #fff;
        border-color: #ccc;
    }

    .act-btn.edit:hover {
        background: #e8f0fe;
        border-color: #c2d4f8;
    }

    .act-btn.edit:hover svg {
        stroke: #1a56b0;
    }

    .act-btn.del:hover {
        background: #fce8e8;
        border-color: #f5c2c2;
    }

    .act-btn.del:hover svg {
        stroke: #b02a2a;
    }

    .act-btn.toggle-btn:hover {
        background: rgba(200, 240, 78, .15);
        border-color: rgba(200, 240, 78, .4);
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

    .pagination-btns {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .pg-btn {
        min-width: 32px;
        height: 32px;
        padding: 0 10px;
        border-radius: 8px;
        border: 1.5px solid var(--border);
        background: var(--paper);
        font-family: 'Syne', sans-serif;
        font-size: 12px;
        font-weight: 600;
        color: var(--muted);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .15s, border-color .15s, color .15s;
    }

    .pg-btn:hover {
        background: #fff;
        color: var(--ink);
        border-color: #ccc;
    }

    .pg-btn.active {
        background: var(--ink);
        color: #fff;
        border-color: var(--ink);
    }

    .pg-btn:disabled {
        opacity: .4;
        cursor: not-allowed;
    }

    /* ── Empty State ── */
    .empty-state {
        padding: 60px 24px;
        text-align: center;
        display: none;
        /* show via JS if no rows */
    }

    .empty-state__icon {
        width: 56px;
        height: 56px;
        background: var(--paper);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
        border: 1.5px solid var(--border);
    }

    .empty-state h3 {
        font-family: 'Syne', sans-serif;
        font-size: 16px;
        font-weight: 700;
        color: var(--ink);
        margin-bottom: 6px;
    }

    .empty-state p {
        font-size: 13px;
        color: var(--muted);
    }

    /* ── Delete Modal ── */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, .45);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 999;
        opacity: 0;
        pointer-events: none;
        transition: opacity .2s;
    }

    .modal-overlay.open {
        opacity: 1;
        pointer-events: all;
    }

    .modal {
        background: var(--surface);
        border-radius: 20px;
        padding: 32px;
        width: 100%;
        max-width: 400px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, .25);
        transform: translateY(12px) scale(.97);
        transition: transform .25s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .modal-overlay.open .modal {
        transform: translateY(0) scale(1);
    }

    .modal__icon {
        width: 48px;
        height: 48px;
        background: #fce8e8;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
    }

    .modal h3 {
        font-family: 'Syne', sans-serif;
        font-size: 17px;
        font-weight: 800;
        color: var(--ink);
        margin-bottom: 8px;
    }

    .modal p {
        font-size: 13px;
        color: var(--muted);
        line-height: 1.6;
    }

    .modal__actions {
        display: flex;
        gap: 10px;
        margin-top: 24px;
    }

    .btn-danger {
        flex: 1;
        padding: 11px;
        background: #dc5050;
        color: #fff;
        border: none;
        border-radius: 11px;
        font-family: 'Syne', sans-serif;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: background .2s;
    }

    .btn-danger:hover {
        background: #b03030;
    }

    .btn-ghost {
        flex: 1;
        padding: 11px;
        background: transparent;
        color: var(--muted);
        border: 1.5px solid var(--border);
        border-radius: 11px;
        font-family: 'DM Sans', sans-serif;
        font-size: 13px;
        cursor: pointer;
        transition: background .15s;
    }

    .btn-ghost:hover {
        background: var(--paper);
        color: var(--ink);
    }

    .btn-bulk-delete {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 14px;
        background: #fce8e8;
        color: #b02a2a;
        border: 1.5px solid #f5c2c2;
        border-radius: 9px;
        font-family: 'DM Sans', sans-serif;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: background .2s;
    }

    .btn-bulk-delete:hover {
        background: #f5c2c2;
    }

    /* Animations */
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
                    {{-- <span class="topbar__eyebrow">Sidebar Management</span> --}}
                    <div class="topbar__title">

                        {{-- <h1>All Sidebar Items</h1>
                        <p>Manage, edit and reorder your navigation sidebar items.</p> --}}
                    </div>
                </div>
                <div class="topbar__right">
                    <div class="search-box">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                        <input type="text" id="searchInput" placeholder="Search items..." oninput="filterTable()">
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
                        <h1>All Lectures </h1>
                        <p>Manage, edit and reorder your navigation lecture items.</p>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px;">
                        <div class="breadcrumb">
                            <a href="{{ route('admin.index') }}">Dashboard</a>
                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <polyline points="9 18 15 12 9 6" />
                            </svg>
                            <span>Lecture Items</span>
                        </div>
                        <a href="{{ route('lecture.create') }}" class="btn-accent">
                            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Add New
                        </a>
                    </div>
                </div>


                @if(session('success'))
                    <div class="alert-success" id="successAlert">
                        <div class="alert-icon">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                        </div>
                        <span>{{ session('success') }}</span>
                        <button onclick="document.getElementById('successAlert').style.display='none'" class="alert-close">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                    </div>
                @endif

                <!-- Table Card -->
                <div class="table-card">

                    <!-- Toolbar -->
                    <div class="table-toolbar">
                        <div class="table-toolbar__left">
                            <div class="table-toolbar__title">Lecture Items</div>
                            <div class="table-toolbar__sub">Showing <span id="rowCount">6</span> items</div>
                        </div>
                        <div class="table-toolbar__right">
                            <button class="btn-bulk-delete" id="bulkDeleteBtn" onclick="openBulkModal()"
                                style="display:none;">
                                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <polyline points="3 6 5 6 21 6" />
                                    <path d="M19 6l-1 14H6L5 6" />
                                    <path d="M10 11v6M14 11v6" />
                                    <path d="M9 6V4h6v2" />
                                </svg>
                                Delete Selected (<span id="selectedCount">0</span>)
                            </button>
                            <select class="filter-select" onchange="filterTable()">
                                <option value="">Filter</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="data-table-wrap">
                        <table id="mainTable">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="selectAll" onclick="toggleAll(this)"
                                            style="cursor:pointer;accent-color:var(--ink);">
                                    </th>
                                    <th>#</th>
                                    <th>Module</th>
                                    <th>Title</th>
                                    <th>Video Path</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            @php
                                $i = 0;
                            @endphp


                            {{-- Pagination --}}
                            <div style="margin-top:1rem;">
                                {{-- {{ $sidebars->links() }} --}}
                            </div>
                        </table>

                        <!-- Empty State -->
                        <div class="empty-state" id="emptyState">
                            <div class="empty-state__icon">
                                <svg width="24" height="24" fill="none" stroke="var(--muted)" stroke-width="1.5"
                                    viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="18" height="18" rx="2" />
                                    <path d="M3 9h18M9 3v18" />
                                </svg>
                            </div>
                            <h3>No items found</h3>
                            <p>Try adjusting your search or filter.</p>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination-bar">
                        <div class="pagination-info">Showing 1–6 of 6 items</div>
                        <div class="pagination-btns">
                            <button class="pg-btn" disabled>
                                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <polyline points="15 18 9 12 15 6" />
                                </svg>
                            </button>
                            <button class="pg-btn active">1</button>
                            <button class="pg-btn">2</button>
                            <button class="pg-btn">3</button>
                            <button class="pg-btn">
                                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <polyline points="9 18 15 12 9 6" />
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <!-- ── Delete Confirm Modal ── -->
    <div class="modal-overlay" id="deleteModal">
        <div class="modal">
            <div class="modal__icon">
                <svg width="22" height="22" fill="none" stroke="#b02a2a" stroke-width="2" viewBox="0 0 24 24">
                    <polyline points="3 6 5 6 21 6" />
                    <path d="M19 6l-1 14H6L5 6" />
                    <path d="M10 11v6M14 11v6" />
                    <path d="M9 6V4h6v2" />
                </svg>
            </div>
            <h3>Delete Sidebar Item?</h3>
            <p>This action cannot be undone. The item will be permanently removed from the sidebar navigation.</p>
            <div class="modal__actions">
                <button class="btn-ghost" onclick="closeModal()">Cancel</button>
                <button class="btn-danger" onclick="confirmDelete()">Yes, Delete</button>
            </div>
        </div>
    </div>

    <x-script />

    <script>

        let selectedIds = [];
        let rowToDelete = null;
        let deleteId = null;


        document.getElementById('tableBody').addEventListener('change', function (e) {
            if (e.target.type === 'checkbox') {
                updateSelectedIds();
            }
        });

        function updateSelectedIds() {
            selectedIds = [];
            document.querySelectorAll('#tableBody input[type="checkbox"]:checked').forEach(cb => {
                const row = cb.closest('tr');
                // row se sidebar id lena - delete button ke form action se
                const form = row.querySelector('form[action]');
                if (form) {
                    const url = form.action;
                    const id = url.split('/').pop();
                    selectedIds.push(id);
                }
            });

            const count = selectedIds.length;
            document.getElementById('selectedCount').textContent = count;
            document.getElementById('bulkDeleteBtn').style.display = count > 0 ? 'inline-flex' : 'none';
        }

        // ── Filter (search + dropdown) ──
        function filterTable() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const filter = document.querySelector('.filter-select').value;
            const rows = document.querySelectorAll('#tableBody tr');
            let visible = 0;

            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                const status = row.dataset.status;
                const matchQ = text.includes(query);
                const matchF = !filter || status === filter;

                if (matchQ && matchF) {
                    row.style.display = '';
                    visible++;
                } else {
                    row.style.display = 'none';
                }
            });

            document.getElementById('rowCount').textContent = visible;
            document.getElementById('emptyState').style.display = visible === 0 ? 'block' : 'none';
        }

        // ── Select All ──
        function toggleAll(master) {
            document.querySelectorAll('#tableBody input[type="checkbox"]')
                .forEach(cb => cb.checked = master.checked);
            updateSelectedIds();
        }

        // ── Bulk Modal ──
        function openBulkModal() {
            if (selectedIds.length === 0) return;

            if (!confirm(`${selectedIds.length} items delete karna chahte hain?`)) return;

            fetch('{{ route("sidebar.bulk-destroy") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ ids: selectedIds })
            })
                .then(r => r.json())
                .then(data => {
                    if (data.success) {
                        document.querySelectorAll('#tableBody input[type="checkbox"]:checked')
                            .forEach(cb => cb.closest('tr').remove());
                        selectedIds = [];
                        document.getElementById('selectedCount').textContent = '0';
                        document.getElementById('bulkDeleteBtn').style.display = 'none';
                        document.getElementById('selectAll').checked = false;
                        updateStats();
                    }
                })
                .catch(err => console.error('Bulk delete failed:', err));
        }

        function closeBulkModal() {
            document.getElementById('bulkDeleteModal').classList.remove('open');
        }

        document.getElementById('bulkDeleteModal').addEventListener('click', function (e) {
            if (e.target === this) closeBulkModal();
        });

        // ── Toggle Active / Inactive (AJAX) ──
        function toggleStatus(btn, id) {
            fetch(`/admin/sidebar/${id}/toggle`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
            })
                .then(r => r.json())
                .then(data => {
                    const row = btn.closest('tr');
                    const pill = row.querySelector('.status-pill');
                    const isActive = data.is_active == 0;  // 0 = active (tumhari logic)

                    row.dataset.status = isActive ? 'active' : 'inactive';
                    pill.className = 'status-pill ' + (isActive ? 'active' : 'inactive');
                    pill.textContent = isActive ? 'Active' : 'Inactive';

                    updateStats();
                })
                .catch(err => console.error('Toggle failed:', err));
        }

        // ── Stats counter ──
        function updateStats() {
            const rows = document.querySelectorAll('#tableBody tr');
            let activeN = 0;
            let inactiveN = 0;

            rows.forEach(r => {
                if (r.style.display === 'none') return;
                if (r.dataset.status === 'active') activeN++;
                if (r.dataset.status === 'inactive') inactiveN++;
            });

            document.getElementById('statActive').textContent = activeN;
            document.getElementById('statInactive').textContent = inactiveN;
            document.getElementById('statTotal').textContent = activeN + inactiveN;
        }

        // ── Delete Modal ──
        function openModal(btn, id) {
            rowToDelete = btn.closest('tr');
            deleteId = id;
            document.getElementById('deleteModal').classList.add('open');
        }

        function closeModal() {
            document.getElementById('deleteModal').classList.remove('open');
            rowToDelete = null;
            deleteId = null;
        }

        document.getElementById('deleteModal').addEventListener('click', function (e) {
            if (e.target === this) closeModal();
        });


        setTimeout(() => {
            const alert = document.getElementById('successAlert');
            if (alert) {
                alert.style.transition = 'opacity .4s, transform .4s';
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-8px)';
                setTimeout(() => alert.remove(), 400);
            }
        }, 4000);
    </script>


</body>

</html>
