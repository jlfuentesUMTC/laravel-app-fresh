<x-layout title="Register User">
    <style>
        :root {
            --nexus-bg: #0a0c12;
            --nexus-panel: #111827;
            --nexus-border: rgba(0, 255, 200, 0.2);
            --nexus-accent: #00f2ff;
            --nexus-text: #cbd5e1;
        }

        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');

        body { font-family: 'Orbitron', sans-serif; }

        .nexus-body {
            background: radial-gradient(circle at 50% 50%, #0f172a 0%, var(--nexus-bg) 100%);
            min-height: 100vh;
            padding: 40px 20px;
            color: var(--nexus-text);
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .nexus-card {
            background: var(--nexus-panel);
            border: 1px solid var(--nexus-border);
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(0, 255, 200, 0.15);
            overflow: hidden;
            width: 100%;
            max-width: 600px;
        }

        h1 { color: var(--nexus-accent); letter-spacing: 2px; }

        .form-input {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid var(--nexus-border);
            background: #000;
            color: var(--nexus-accent);
            font-size: 14px;
            margin-bottom: 12px;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--nexus-accent);
            box-shadow: 0 0 10px rgba(0, 255, 200, 0.3);
        }

        .btn-primary {
            background: var(--nexus-accent);
            color: #000;
            padding: 12px;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            transition: 0.3s;
            width: 100%;
        }
        .btn-primary:hover { background: #06b6d4; box-shadow: 0 0 15px var(--nexus-accent); }

        .back-link {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: var(--nexus-accent);
            font-size: 0.8rem;
            text-decoration: none;
            transition: 0.2s;
        }
        .back-link:hover { text-decoration: underline; }
    </style>

    <div class="nexus-body">
        <div class="nexus-card p-7">
            <h1 class="text-xl font-bold mb-4">Register User</h1>
            <p class="text-sm opacity-70 mb-6">Fill in your details below</p>

            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <input class="form-input" type="text" name="first_name" placeholder="First Name" required>
                    <input class="form-input" type="text" name="last_name" placeholder="Last Name" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <input class="form-input" type="text" name="middle_name" placeholder="Middle Name">
                    <input class="form-input" type="text" name="nickname" placeholder="Nickname">
                </div>

                <input class="form-input" type="email" name="email" placeholder="Email" required>

                <div class="grid grid-cols-2 gap-4">
                    <input class="form-input" type="number" name="age" placeholder="Age">
                    <input class="form-input" type="text" name="contact_number" placeholder="Contact Number">
                </div>

                <textarea class="form-input" name="address" placeholder="Address" rows="2"></textarea>

                <button class="btn-primary" type="submit">Register User</button>
            </form>

            <a href="{{ route('users.index') }}" class="back-link">← Back to Dashboard</a>
        </div>
    </div>
</x-layout>