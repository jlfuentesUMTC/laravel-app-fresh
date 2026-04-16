<x-layout title="Post Management">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        .font-nexus { font-family: 'Orbitron', sans-serif; }
        .nexus-gradient { background: radial-gradient(circle at 50% 50%, #1e293b 0%, #0a0c12 100%); }
        
        .nexus-glass {
            background: rgba(17, 24, 39, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(34, 211, 238, 0.2);
            box-shadow: 0 0 40px rgba(0, 242, 255, 0.05);
        }

        /* Custom scrollbar for the posts list */
        .custom-scroll::-webkit-scrollbar { width: 4px; }
        .custom-scroll::-webkit-scrollbar-track { background: transparent; }
        .custom-scroll::-webkit-scrollbar-thumb { background: rgba(34, 211, 238, 0.2); border-radius: 10px; }
    </style>

    <div class="min-h-screen nexus-gradient py-12 px-4 sm:px-6 lg:px-8 font-nexus antialiased flex items-center justify-center">
        <div class="max-w-xl mx-auto w-full">
            
            <div class="nexus-glass rounded-3xl overflow-hidden shadow-2xl">
                
                <div class="px-8 pt-8 pb-6 bg-gradient-to-b from-cyan-500/10 to-transparent border-b border-cyan-500/10">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-cyan-500/20 rounded-2xl ring-1 ring-cyan-400/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-cyan-400 tracking-widest uppercase">POST_MANAGER_v2</h1>
                            <p class="text-[10px] text-cyan-500/60 uppercase tracking-[0.3em] font-bold">Protocol: Secure_Data_Input</p>
                        </div>
                    </div>
                </div>

                <div class="px-8 py-8">
                    <form method="POST" action="/formtest">
                        @csrf
                        <div class="relative group">
                            <label for="description" class="block text-[10px] font-bold text-cyan-500/40 mb-2 ml-1 uppercase tracking-widest">
                                Input_Broadcast
                            </label>
                            <input 
                                id="description"
                                type="text"
                                name="description"
                                required
                                placeholder="SYNC_NEW_POST..."
                                class="w-full rounded-xl bg-black/50 border border-cyan-500/30 text-cyan-100 px-4 py-3.5 text-sm transition-all
                                       placeholder:text-cyan-900/60
                                       focus:border-cyan-400 focus:ring-4 focus:ring-cyan-500/10 focus:outline-none"
                            />
                        </div>

                        <div class="mt-4 flex justify-end">
                            <button 
                                type="submit"
                                class="w-full sm:w-auto bg-cyan-500 hover:bg-cyan-400 active:scale-95 transition-all px-10 py-3 rounded-xl text-[10px] font-black text-black uppercase tracking-[0.2em] shadow-lg shadow-cyan-500/20"
                            >
                                EXECUTE_SAVE
                            </button>
                        </div>
                    </form>
                </div>

                <div class="px-8">
                    <div class="w-full border-t border-cyan-500/10"></div>
                </div>

                <div class="px-8 py-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-[11px] font-bold text-cyan-500/70 flex items-center tracking-widest uppercase">
                            <span>TERMINAL_RECORDS</span>
                        </h2>
                        <span class="px-2.5 py-1 text-[9px] font-black bg-cyan-500/10 text-cyan-400 rounded-lg border border-cyan-500/20 uppercase tracking-tighter">
                            {{ count($posts) }} ACTIVE_NODES
                        </span>
                    </div>

                    <ul class="space-y-3 max-h-[300px] overflow-y-auto custom-scroll pr-1">
                        @forelse ($posts as $post)
                            <li class="group flex items-center justify-between bg-white/5 hover:bg-cyan-500/5 px-4 py-4 rounded-2xl border border-white/5 hover:border-cyan-500/20 transition-all duration-300">
                                
                                <div class="flex items-center space-x-3 overflow-hidden">
                                    <div class="h-1.5 w-1.5 rounded-full bg-cyan-400 shadow-[0_0_8px_rgba(34,211,238,0.8)] animate-pulse"></div>
                                    <span class="text-xs font-medium text-slate-300 truncate tracking-wide">
                                        {{ $post->description }}
                                    </span>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <a 
                                        href="/posts/{{ $post->id }}/edit"
                                        class="opacity-0 group-hover:opacity-100 transition-all text-cyan-500/40 hover:text-cyan-400 p-1 transform hover:scale-125"
                                        title="EDIT_NODE"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>

                                    <form method="POST" action="/formtest/{{ $post->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit"
                                            class="opacity-0 group-hover:opacity-100 transition-all text-rose-500/40 hover:text-rose-500 p-1 transform hover:scale-125"
                                            onclick="return confirm('INITIALIZE_DELETE_SEQUENCE?')"
                                            title="PURGE_NODE"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @empty
                            <div class="text-center py-12 rounded-2xl bg-black/20 border border-dashed border-cyan-500/10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-cyan-900 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <p class="text-cyan-900 text-[10px] font-bold uppercase tracking-widest">Zero_Records_Indexed</p>
                            </div>
                        @endforelse
                    </ul>
                </div>

                <div class="px-8 py-3 bg-cyan-500/5 border-t border-cyan-500/10 text-center">
                    <span class="text-[8px] text-cyan-900 tracking-[0.4em] uppercase font-black">System_Heartbeat: Normal</span>
                </div>
            </div>

            <div class="text-center mt-8">
                <p class="text-cyan-900 text-[9px] uppercase tracking-[0.4em] font-black">
                    University of Mindanao • Nexus_Data_Systems
                </p>
            </div>
        </div>
    </div>
</x-layout>