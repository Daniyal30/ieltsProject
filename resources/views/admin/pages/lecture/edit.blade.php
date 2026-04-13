<!DOCTYPE html>
<html lang="en">

<x-head />

<style>
    /* ---- Tumhari existing create.blade.php wali CSS copy karo ---- */
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
        background-image: linear-gradient(rgba(255, 255, 255, .03) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, .03) 1px, transparent 1px);
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

    .main-panel {
        background: var(--paper);
        display: flex;
        flex-direction: column;
        width: 100%;
        overflow: hidden;
    }

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

    .content {
        flex: 1;
        overflow-y: auto;
        padding: 32px;
    }

    .content::-webkit-scrollbar {
        width: 6px;
    }

    .content::-webkit-scrollbar-thumb {
        background: var(--border);
        border-radius: 3px;
    }

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 28px;
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
    }

    .breadcrumb a:hover {
        color: var(--ink);
    }

    .breadcrumb span {
        color: var(--ink);
        font-weight: 500;
    }

    .form-card {
        background: var(--surface);
        border-radius: 20px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, .05), 0 4px 20px rgba(0, 0, 0, .06), 0 0 0 1px var(--border);
        overflow: hidden;
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

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 7px;
        margin-bottom: 20px;
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
    select:focus {
        border-color: var(--ink);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(200, 240, 78, .2);
    }

    input::placeholder {
        color: var(--muted);
    }

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

    .form-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        padding-top: 12px;
        margin-top: 12px;
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
        cursor: pointer;
        transition: background .2s, border-color .2s, color .2s;
        text-decoration: none;
    }

    .btn-ghost:hover {
        background: var(--paper);
        border-color: #ccc;
        color: var(--ink);
    }

    /* Current video preview */
    .current-video-wrap {
        background: var(--paper);
        border: 1.5px solid var(--border);
        border-radius: 11px;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 8px;
    }

    .current-video-wrap svg {
        color: var(--muted);
        flex-shrink: 0;
    }

    .current-video-info {
        flex: 1;
    }

    .current-video-info p {
        font-size: 12px;
        color: var(--muted);
        margin: 0;
    }

    .current-video-info span {
        font-size: 13px;
        font-weight: 500;
        color: var(--ink);
    }

    .change-video-btn {
        font-size: 12px;
        color: #6366f1;
        cursor: pointer;
        text-decoration: underline;
        background: none;
        border: none;
        padding: 0;
    }

    /* Quill fonts */
    .ql-font-arial {
        font-family: Arial, sans-serif !important;
    }

    .ql-font-times {
        font-family: "Times New Roman", serif !important;
    }

    .ql-font-courier {
        font-family: "Courier New", monospace !important;
    }

    .ql-font-georgia {
        font-family: Georgia, serif !important;
    }

    .ql-font-verdana {
        font-family: Verdana, sans-serif !important;
    }

    .ql-font-tahoma {
        font-family: Tahoma, sans-serif !important;
    }

    .ql-highlight::before {
        content: "H";
        font-weight: bold;
        background: yellow;
        color: #000;
        padding: 0 4px;
        border-radius: 2px;
    }
</style>

<body>
    <div class="scene">

        <!-- Sidebar -->
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

        <!-- Main Panel -->
        <div class="main-panel">

            <!-- Topbar -->
            <header class="topbar">
                <div class="topbar__left">
                    <span class="topbar__eyebrow">Lecture Management</span>
                    <div class="topbar__title">
                        <div class="icon-badge">
                            <svg width="14" height="14" fill="none" stroke="var(--ink)" stroke-width="2.2"
                                viewBox="0 0 24 24">
                                <path d="M12 20h9" />
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                            </svg>
                        </div>
                        Edit Lecture
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

            <!-- Content -->
            <main class="content">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="page-header__left">
                        <h1>Edit Lecture</h1>
                        <p>Update the lecture details below.</p>
                    </div>
                    <div class="breadcrumb">
                        <a href="{{ route('admin.index') }}">Dashboard</a>
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                        <a href="{{ route('lecture.index') }}">Lectures</a>
                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                        <span>Edit</span>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="form-card">
                    <div class="form-card__inner">
                        <div class="form-card__title">Item Details</div>
                        <div class="form-card__sub">All fields marked with * are required.</div>

                        <form id="lecture-form">
                            @csrf

                            <!-- Module -->
                            <div class="form-group">
                                <label for="module_id">Module Name <span class="required">*</span></label>
                                <div class="input-wrap select-wrap">
                                    <select name="module_id" id="module_id">
                                        <option value="">-- Select Module --</option>
                                        @foreach ($modules as $module)
                                            <option value="{{ $module->id }}"
                                                {{ $lecture->module_id == $module->id ? 'selected' : '' }}>
                                                {{ $module->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Title -->
                            <div class="form-group">
                                <label for="title">Title <span class="required">*</span></label>
                                <div class="input-wrap">
                                    <input type="text" id="title" name="title" value="{{ $lecture->title }}"
                                        placeholder="e.g. Introduction to Laravel">
                                </div>
                            </div>

                            <!-- Current Video + Option to Change -->
                            <div class="form-group">
                                <label>Video</label>

                                <!-- Current video show karo -->
                                <div class="current-video-wrap" id="current-video-section">
                                    <svg width="20" height="20" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <polygon points="23 7 16 12 23 17 23 7" />
                                        <rect x="1" y="5" width="15" height="14" rx="2" ry="2" />
                                    </svg>
                                    <div class="current-video-info">
                                        <p>Current video</p>
                                        <span>{{ basename($lecture->video_path) }}</span>
                                    </div>
                                    <button type="button" class="change-video-btn" onclick="showNewUpload()">
                                        Change Video
                                    </button>
                                </div>

                                <!-- New upload section — pehle hidden -->
                                <div id="new-upload-section" style="display:none;">
                                    <input type="file" id="video_path" accept="video/*">
                                    <p style="font-size:11px; color:var(--muted); margin-top:4px;">
                                        MP4, AVI, MOV, MKV — Large files supported ✅
                                    </p>
                                    <button type="button" class="change-video-btn"
                                        style="color:var(--muted); margin-top:6px;" onclick="cancelNewUpload()">
                                        Cancel — Keep existing video
                                    </button>
                                </div>
                            </div>

                            <!-- Hidden Fields -->
                            <input type="hidden" id="upload_id" name="upload_id">
                            <input type="hidden" id="file_name" name="file_name">

                            <!-- Description -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <div id="description-editor" style="height:350px;"></div>
                                <input type="hidden" name="description" id="description-input">
                            </div>

                            <!-- Progress Bar -->
                            <div id="upload-progress" style="display:none; margin-bottom:15px;">
                                <p style="font-weight:500;">Uploading video...</p>
                                <div style="background:#e0e0e0; border-radius:8px; height:10px;">
                                    <div id="progress-bar"
                                        style="background:#4f46e5; height:10px; border-radius:8px;
                                            width:0%; transition:width 0.3s;">
                                    </div>
                                </div>
                                <p id="progress-text" style="font-size:12px; margin-top:4px; color:#555;">0%</p>
                            </div>

                            <!-- Actions -->
                            <div class="form-actions">
                                <button type="submit" id="submit-btn" class="btn-accent">
                                    Update Lecture
                                </button>
                        </form>

                    </div>
                </div>
            </main>
        </div>
    </div>

    <x-script />
    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.7/quill.snow.css">
    <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <script>
        // ── Quill Setup ──
        var Font = Quill.import('formats/font');
        Font.whitelist = ['arial', 'times', 'courier', 'georgia', 'verdana', 'tahoma'];
        Quill.register(Font, true);

        var Inline = Quill.import('blots/inline');
        class HighlightBlot extends Inline {
            static create(color) {
                let node = super.create();
                node.style.backgroundColor = color || 'yellow';
                return node;
            }
            static formats(node) {
                return node.style.backgroundColor || 'yellow';
            }
        }
        HighlightBlot.blotName = 'highlight';
        HighlightBlot.tagName = 'mark';
        Quill.register(HighlightBlot, true);

        var quill = new Quill('#description-editor', {
            theme: 'snow',
            placeholder: 'Description likhein...',
            modules: {
                toolbar: {
                    container: [
                        [{
                            font: ['arial', 'times', 'courier', 'georgia', 'verdana', 'tahoma']
                        }],
                        [{
                            size: ['small', false, 'large', 'huge']
                        }],
                        [{
                            header: [1, 2, 3, 4, 5, 6, false]
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            color: []
                        }, {
                            background: []
                        }],
                        ['highlight'],
                        [{
                            list: 'ordered'
                        }, {
                            list: 'bullet'
                        }],
                        [{
                            indent: '-1'
                        }, {
                            indent: '+1'
                        }],
                        [{
                            align: []
                        }],
                        ['link', 'image'],
                        ['clean']
                    ],
                    handlers: {
                        highlight: function() {
                            var range = quill.getSelection();
                            if (range && range.length > 0) {
                                var fmt = quill.getFormat(range);
                                if (fmt.highlight) {
                                    quill.removeFormat(range.index, range.length);
                                } else {
                                    quill.format('highlight', 'yellow');
                                }
                            }
                        }
                    }
                }
            }
        });

        // ✅ Existing description load karo editor mein
        quill.root.innerHTML = `{!! $lecture->description !!}`;
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let uploadedId = null;
            let uploadedName = null;
            let pond = null;
            let videoChanged = false;

            // ── Change Video button ──
            window.showNewUpload = function() {
                document.getElementById('current-video-section').style.display = 'none';
                document.getElementById('new-upload-section').style.display = 'block';
                document.getElementById('upload-progress').style.display = 'none';
                videoChanged = true;

                // FilePond initialize karo
                pond = FilePond.create(document.getElementById('video_path'), {
                    allowMultiple: false,
                    chunkUploads: true,
                    chunkSize: 5000000,

                    server: {
                        process: {
                            url: '{{ route('upload.init') }}',
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            onload: (response) => {
                                if (response && response.responseText) {
                                    uploadedId = response.responseText.trim();
                                } else if (typeof response === 'string') {
                                    uploadedId = response.trim();
                                } else {
                                    uploadedId = String(response).trim();
                                }
                                console.log('Upload ID:', uploadedId);
                                return uploadedId;
                            },
                            onerror: (response) => {
                                console.error('Upload error:', response);
                            }
                        },
                        patch: {
                            url: '/upload/chunk/',
                            method: 'PATCH',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        },
                        revert: {
                            url: '{{ route('upload.delete') }}',
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        }
                    },

                    onaddfile: (error, file) => {
                        uploadedName = file.filename;
                        document.getElementById('upload-progress').style.display = 'block';
                    },
                    onprocessfileprogress: (file, progress) => {
                        const pct = Math.round(progress * 100);
                        document.getElementById('progress-bar').style.width = pct + '%';
                        document.getElementById('progress-text').textContent = pct + '%';
                    },
                    onprocessfile: (error, file) => {
                        if (!error) {
                            if (file.serverId) uploadedId = file.serverId;
                            console.log('Final uploadedId:', uploadedId);
                            document.getElementById('progress-text').textContent =
                                'Upload complete ✅';
                        }
                    }
                });
            };

            // ── Cancel change video ──
            window.cancelNewUpload = function() {
                document.getElementById('current-video-section').style.display = 'flex';
                document.getElementById('new-upload-section').style.display = 'none';
                document.getElementById('upload-progress').style.display = 'none';
                videoChanged = false;
                uploadedId = null;
                uploadedName = null;
                if (pond) {
                    pond.destroy();
                    pond = null;
                }
            };

            // ── Form Submit ──
            document.getElementById('lecture-form').addEventListener('submit', async function(e) {
                e.preventDefault();

                // Agar video change ki hai to upload complete hona chahiye
                if (videoChanged && !uploadedId) {
                    alert('Please wait for video to finish uploading!');
                    return;
                }

                // Description set karo
                document.getElementById('description-input').value = quill.root.innerHTML;

                const btn = document.getElementById('submit-btn');
                btn.disabled = true;
                btn.textContent = 'Updating...';

                try {
                    const res = await fetch('{{ route('lecture.update', $lecture->id) }}', {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({
                            module_id: document.getElementById('module_id').value,
                            title: document.getElementById('title').value,
                            description: document.getElementById('description-input')
                                .value,
                            upload_id: uploadedId, // null if no new video
                            file_name: uploadedName, // null if no new video
                        })
                    });

                    const result = await res.json();

                    if (result.success) {
                        window.location.href = '{{ route('lecture.index') }}';
                    } else {
                        alert('Something went wrong!');
                        btn.disabled = false;
                        btn.textContent = 'Update Lecture';
                    }
                } catch (err) {
                    console.error(err);
                    alert('Error updating lecture!');
                    btn.disabled = false;
                    btn.textContent = 'Update Lecture';
                }
            });
        });
    </script>

</body>

</html>
