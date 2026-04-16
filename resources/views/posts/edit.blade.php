<x-layout title="Edit Post">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        .font-nexus { font-family: 'Orbitron', sans-serif; }
        .nexus-gradient { background: radial-gradient(circle at 50% 50%, #1e293b 0%, #0a0c12 100%); }
        
        /* Custom glow for the glass card to match the theme */
        .nexus-glass {
            background: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(34, 211, 238, 0.2);
            box-shadow: 0 0 30px rgba(0, 242, 255, 0.1);
        }
    </style>

    <div class="nexus-gradient font-nexus min-h-screen py-12 px-4 sm:px-6 lg:px-8 flex items-center antialiased">
        <div class="max-w-xl mx-auto w-full">
            
            <div class="nexus-glass rounded-3xl overflow-hidden">
                
                <div class="px-8 pt-8 pb-6 bg-gradient-to-b from-cyan-500/10 to-transparent">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-cyan-500/20 rounded-2xl ring-1 ring-cyan-400/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-cyan-400 tracking-wider">POST_EDITOR</h1>
                            <p class="text-[10px] text-cyan-500/60 uppercase tracking-[0.2em] font-bold">Modifying_Record_ID: {{ $post->id }}</p>
                        </div>
                    </div>
                </div>

                <div class="px-8 pb-8">
                    <form method="POST" action="/posts/{{ $post->id }}">
                        @csrf
                        @method('PATCH')
                        
                        <div class="relative group">
                            <label for="description" class="block text-[10px] font-bold text-cyan-500/50 mb-3 ml-1 uppercase tracking-widest">
                                Data_Content
                            </label>
                            <textarea 
                                id="description"
                                name="description"
                                required
                                rows="5"
                                placeholder="Enter system broadcast..."
                                class="w-full rounded-xl bg-black/40 border border-cyan-500/30 text-cyan-100 px-4 py-3.5 text-sm transition-all
                                       placeholder:text-cyan-900
                                       focus:border-cyan-400 focus:ring-4 focus:ring-cyan-500/10 focus:outline-none"
                            >{{ $post->description }}</textarea>
                        </div>

                        <div class="mt-8 flex flex-col sm:flex-row gap-4">
                            <button 
                                type="submit"
                                class="flex-1 bg-cyan-500 hover:bg-cyan-400 active:scale-95 transition-all py-3 rounded-xl text-xs font-bold text-black uppercase tracking-widest shadow-lg shadow-cyan-500/20"
                            >
                                Update_Archive
                            </button>
                            
                            <a 
                                href="/posts"
                                class="px-8 py-3 rounded-xl text-xs font-bold text-rose-500 border border-rose-500/30 hover:bg-rose-500/10 hover:border-rose-500 transition-all text-center uppercase tracking-widest"
                            >
                                Abort
                            </a>
                        </div>
                    </form>
                </div>

                <div class="px-8 py-4 bg-cyan-500/5 border-t border-cyan-500/10 flex justify-between items-center">
                    <span class="text-[8px] text-cyan-900 tracking-tighter uppercase">Nexus_Encryption_Active</span>
                    <div class="flex space-x-1">
                        <div class="w-1.5 h-1.5 rounded-full bg-cyan-500/20 animate-pulse"></div>
                        <div class="w-1.5 h-1.5 rounded-full bg-cyan-500/40 animate-pulse delay-75"></div>
                        <div class="w-1.5 h-1.5 rounded-full bg-cyan-500/60 animate-pulse delay-150"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-layout>