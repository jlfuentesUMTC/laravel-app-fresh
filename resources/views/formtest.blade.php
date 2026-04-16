<x-layout title="Formtest Console">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        .font-nexus { font-family: 'Orbitron', sans-serif; }
        .nexus-gradient { background: radial-gradient(circle at 50% 50%, #0f172a 0%, #0a0c12 100%); }
    </style>

    <div class="nexus-gradient font-nexus min-h-screen py-10 px-4 text-slate-300">
        <div class="max-w-3xl mx-auto space-y-8">
            
            <div class="bg-gray-900 border border-cyan-500/20 rounded-[20px] shadow-[0_0_25px_rgba(0,255,200,0.15)] p-7 overflow-hidden">
                <h1 class="text-xl font-bold mb-6 text-cyan-400 tracking-[2px] uppercase">
                    Formtest_Console.exe
                </h1>

                <form method="POST" action="/formtest" class="space-y-4">
                    @csrf
                    <div class="relative">
                        <input type="text" name="description" placeholder="Enter Post Content..." required
                            class="w-full bg-black border border-cyan-500/20 rounded-xl p-3 text-sm text-cyan-400 placeholder:text-cyan-900 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all shadow-inner">
                    </div>
                    
                    <button type="submit" 
                        class="w-full bg-cyan-400 hover:bg-cyan-500 text-black font-black py-3 rounded-xl transition-all hover:shadow-[0_0_15px_rgba(34,211,238,0.6)] uppercase text-xs tracking-widest">
                        Save_Post
                    </button>
                </form>
            </div>

            <div class="bg-gray-900 border border-cyan-500/20 rounded-[20px] shadow-[0_0_25px_rgba(0,255,200,0.15)] p-7 overflow-hidden">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold text-cyan-400 tracking-[2px] uppercase">
                        Active_Post_Logs
                    </h2>
                    <div class="flex items-center gap-2">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-cyan-500"></span>
                        </span>
                        <span class="text-[10px] font-bold text-cyan-500/60 tracking-tighter">
                            // {{ count($posts) }} RECORDS_FOUND
                        </span>
                    </div>
                </div>

                <div class="space-y-3">
                    @forelse ($posts as $post)
                        <div class="bg-black/40 border-l-4 border-cyan-500 p-4 flex justify-between items-center group hover:bg-cyan-500/5 transition-colors">
                            <div class="text-sm text-white font-medium group-hover:text-cyan-300 transition-colors">
                                {{ $post->description }}
                            </div>
                            
                            <form method="POST" action="/formtest/{{ $post->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="text-rose-500 hover:text-white text-2xl font-light px-2 leading-none transition-colors"
                                    aria-label="Delete Post"
                                    onclick="return confirm('Execute Purge?')">
                                    &times;
                                </button>
                            </form>
                        </div>
                    @empty
                        <div class="text-center py-10 text-cyan-900 text-[10px] tracking-[0.5em] uppercase font-bold border border-dashed border-cyan-500/10 rounded-xl">
                            [ NO_ACTIVE_RECORDS_FOUND ]
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="text-center pt-4">
                <p class="text-cyan-400/30 text-[10px] uppercase tracking-[0.4em] font-black">
                    University of Mindanao • Nexus_Data_Systems
                </p>
            </div>
        </div>
    </div>
</x-layout>