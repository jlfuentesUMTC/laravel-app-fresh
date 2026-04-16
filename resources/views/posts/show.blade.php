<x-layout title="View Post">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        .font-nexus { font-family: 'Orbitron', sans-serif; }
        .nexus-gradient { background: radial-gradient(circle at 50% 50%, #1e293b 0%, #0a0c12 100%); }
        
        .nexus-glass {
            background: rgba(17, 24, 39, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(34, 211, 238, 0.2);
            box-shadow: 0 0 50px rgba(0, 242, 255, 0.05);
        }

        /* Decorative scanning line effect */
        .scanline {
            width: 100%;
            height: 2px;
            background: rgba(34, 211, 238, 0.1);
            position: absolute;
            animation: scan 4s linear infinite;
        }

        @keyframes scan {
            0% { top: 0%; }
            100% { top: 100%; }
        }
    </style>

    <div class="min-h-screen nexus-gradient py-12 px-4 sm:px-6 lg:px-8 font-nexus antialiased flex items-center justify-center relative overflow-hidden">
        <div class="max-w-xl mx-auto w-full relative z-10">
            
            <div class="nexus-glass rounded-3xl overflow-hidden relative">
                <div class="scanline"></div>

                <div class="px-8 pt-8 pb-6 bg-gradient-to-b from-cyan-500/10 to-transparent border-b border-cyan-500/10">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-cyan-500/20 rounded-2xl ring-1 ring-cyan-400/30">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-xl font-bold text-cyan-400 tracking-widest uppercase">POST_DECRYPTED</h1>
                                <p class="text-[9px] text-cyan-500/50 uppercase tracking-[0.3em] font-bold">Origin: Local_Terminal_Archive</p>
                            </div>
                        </div>
                        
                        <div class="text-right">
                            <span class="text-[10px] text-cyan-500/40 block">UID_HASH</span>
                            <span class="text-xs text-cyan-300 font-bold">#{{ $post->id }}</span>
                        </div>
                    </div>
                </div>

                <div class="px-8 py-10 bg-black/20">
                    <div class="relative">
                        <div class="absolute -top-4 -left-4 w-4 h-4 border-t-2 border-l-2 border-cyan-500/30"></div>
                        <div class="absolute -bottom-4 -right-4 w-4 h-4 border-b-2 border-r-2 border-cyan-500/30"></div>
                        
                        <label class="text-[10px] text-cyan-500/40 uppercase tracking-[0.4em] mb-4 block">Broadcast_Payload:</label>
                        
                        <p class="text-lg md:text-xl text-white leading-relaxed tracking-tight drop-shadow-[0_0_8px_rgba(255,255,255,0.2)]">
                            {{ $post->description }}
                        </p>
                    </div>
                </div>

                <div class="px-8 py-6 bg-cyan-500/5 border-t border-cyan-500/10 flex items-center justify-between">
                    <a href="/posts" class="text-[10px] text-slate-400 hover:text-cyan-400 transition-colors uppercase tracking-widest flex items-center group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Return_to_List
                    </a>
                    
                    <div class="flex space-x-3">
                        <a href="/posts/{{ $post->id }}/edit" class="px-4 py-2 bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 text-[10px] font-bold rounded-lg hover:bg-cyan-500 hover:text-black transition-all uppercase tracking-widest">
                            Modify_Node
                        </a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-8">
                <p class="text-cyan-900 text-[9px] uppercase tracking-[0.5em] font-black">
                    University of Mindanao • Nexus_Data_Systems
                </p>
            </div>
        </div>
    </div>
</x-layout>