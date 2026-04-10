<x-layout title="Formtest Console">
    <style>
        :root {
            --nexus-bg: #0a0c12;
            --nexus-panel: #111827;
            --nexus-border: rgba(0, 255, 200, 0.2);
            --nexus-accent: #00f2ff;
            --nexus-danger: #ef4444;
            --nexus-text: #cbd5e1;
        }

        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');

        body { font-family: 'Orbitron', sans-serif; }

        .nexus-body {
            background: radial-gradient(circle at 50% 50%, #0f172a 0%, var(--nexus-bg) 100%);
            min-height: 100vh;
            padding: 40px 20px;
            color: var(--nexus-text);
        }

        .nexus-card {
            background: var(--nexus-panel);
            border: 1px solid var(--nexus-border);
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(0, 255, 200, 0.15);
            overflow: hidden;
            margin-bottom: 30px;
        }

        h1, h2 { color: var(--nexus-accent); letter-spacing: 2px; }

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
        }
        .btn-primary:hover { background: #06b6d4; box-shadow: 0 0 15px var(--nexus-accent); }

        .post-log {
            background: rgba(0,0,0,0.4);
            border-left: 3px solid var(--nexus-accent);
            padding: 15px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 4px;
        }

        .post-details { color: #fff; font-size: 0.85rem; }
        .del-btn {
            color: var(--nexus-danger);
            background: transparent;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0 10px;
        }
        .del-btn:hover { color: #fff; }
    </style>

    <div class="nexus-body max-w-3xl mx-auto">
        <div class="nexus-card p-7">
            <h1 class="text-xl font-bold mb-4">Formtest_Console.exe</h1>

            <!-- Form -->
            <form method="POST" action="/formtest">
                @csrf
                <input class="form-input" type="text" name="description" placeholder="Enter Post Content..." required>
                <button type="submit" class="btn-primary">Save Post</button>
            </form>
        </div>

        <!-- Posts List -->
        <div class="nexus-card p-7">
            <h2 class="text-lg font-bold mb-4">Active_Post_Logs // {{ count($posts) }} Records</h2>
            @forelse ($posts as $post)
                <div class="post-log">
                    <div class="post-details">{{ $post->description }}</div>
                    <form method="POST" action="/formtest/{{ $post->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="del-btn" aria-label="Delete Post">×</button>
                    </form>
                </div>
            @empty
                <div style="text-align: center; padding: 40px; color: var(--text); font-size: 0.8rem;">
                    [ NO_ACTIVE_RECORDS_FOUND ]
                </div>
            @endforelse
        </div>

        <div class="text-center mt-8">
            <p class="text-cyan-300 text-[10px] uppercase tracking-[0.3em] font-bold">
                University of Mindanao • Data Systems
            </p>
        </div>
    </div>
</x-layout>