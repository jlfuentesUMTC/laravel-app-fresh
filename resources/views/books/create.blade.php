<x-layout title="Add Book">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        .font-nexus { font-family: 'Orbitron', sans-serif; }
        .nexus-gradient { background: radial-gradient(circle at 50% 50%, #1e293b 0%, #0a0c12 100%); }
    </style>

    <div class="nexus-gradient font-nexus min-h-screen p-10 text-slate-300">
        <div class="max-w-3xl mx-auto">
            
            <div class="mb-10 text-center">
                <h1 class="text-4xl font-bold text-cyan-400 tracking-widest drop-shadow-[0_0_10px_rgba(34,211,238,0.5)]">
                    INITIALIZE_NEW_RECORD
                </h1>
                <p class="text-xs text-cyan-500/60 mt-2 uppercase tracking-tighter underline decoration-cyan-500/30">
                    Input Data into Central Archive
                </p>
            </div>

            <div class="bg-slate-900/80 border border-cyan-500/20 rounded-2xl shadow-2xl p-8 backdrop-blur-xl">
                <form method="POST" action="/books" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="title" placeholder="BOOK_TITLE" required
                            class="bg-black/50 border border-cyan-500/30 rounded-lg p-3 text-cyan-400 placeholder:text-cyan-900 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all">
                        
                        <input type="text" name="author" placeholder="AUTHOR_NAME" required
                            class="bg-black/50 border border-cyan-500/30 rounded-lg p-3 text-cyan-400 placeholder:text-cyan-900 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all">
                    </div>

                    <textarea name="description" placeholder="ARCHIVE_SUMMARY / DESCRIPTION" rows="3"
                        class="w-full bg-black/50 border border-cyan-500/30 rounded-lg p-3 text-cyan-400 placeholder:text-cyan-900 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all"></textarea>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <select name="genre" required
                            class="bg-black/50 border border-cyan-500/30 rounded-lg p-3 text-cyan-400 focus:outline-none focus:border-cyan-400 transition-all cursor-pointer">
                            <option value="" class="bg-slate-900">SELECT_GENRE</option>
                            <option value="Fiction" class="bg-slate-900">Fiction</option>
                            <option value="Sci-Fi" class="bg-slate-900">Sci-Fi</option>
                            <option value="Non-Fiction" class="bg-slate-900">Non-Fiction</option>
                            <option value="Fantasy" class="bg-slate-900">Fantasy</option>
                        </select>

                        <input type="number" name="published_year" placeholder="YEAR"
                            class="bg-black/50 border border-cyan-500/30 rounded-lg p-3 text-cyan-400 placeholder:text-cyan-900 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all">
                        
                        <input type="text" name="isbn" placeholder="ISBN_SERIAL"
                            class="bg-black/50 border border-cyan-500/30 rounded-lg p-3 text-cyan-400 placeholder:text-cyan-900 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <input type="number" name="pages" placeholder="PAGE_COUNT"
                            class="bg-black/50 border border-cyan-500/30 rounded-lg p-3 text-cyan-400 placeholder:text-cyan-900 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all">
                        
                        <input type="text" name="language" placeholder="LANGUAGE_CODE"
                            class="bg-black/50 border border-cyan-500/30 rounded-lg p-3 text-cyan-400 placeholder:text-cyan-900 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all">
                        
                        <input type="text" name="publisher" placeholder="PUBLISHER_ENTITY"
                            class="bg-black/50 border border-cyan-500/30 rounded-lg p-3 text-cyan-400 placeholder:text-cyan-900 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center border-t border-cyan-500/10 pt-6">
                        <div class="relative">
                            <span class="absolute left-3 top-3 text-cyan-900 font-bold">₱</span>
                            <input type="number" step="0.01" name="price" placeholder="VALUATION_PRICE"
                                class="w-full bg-black/50 border border-cyan-500/30 rounded-lg p-3 pl-8 text-cyan-400 placeholder:text-cyan-900 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 transition-all">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="text-[10px] text-cyan-500/60 uppercase tracking-widest">Visual_Asset (Cover)</label>
                            <input type="file" name="cover_image" 
                                class="text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-cyan-500/10 file:text-cyan-400 hover:file:bg-cyan-500/20 cursor-pointer">
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-4 bg-cyan-500/5 border border-cyan-500/10 rounded-lg group hover:border-cyan-500/30 transition-all">
                        <input type="checkbox" name="is_available" value="1" id="available" checked
                            class="w-5 h-5 accent-cyan-400 bg-black border-cyan-500/30 rounded focus:ring-0">
                        <label for="available" class="text-sm cursor-pointer select-none group-hover:text-cyan-300 transition-colors uppercase tracking-widest">
                            Available_for_Distribution
                        </label>
                    </div>

                    <div class="flex gap-4 pt-4">
                        <button type="submit" 
                            class="flex-1 bg-cyan-500 hover:bg-cyan-400 text-black font-bold py-4 rounded-xl transition-all hover:shadow-[0_0_25px_rgba(34,211,238,0.5)] uppercase tracking-widest">
                            SAVE_TO_DATABASE
                        </button>
                        <a href="/books" 
                           class="px-8 py-4 rounded-xl border border-rose-500/50 text-rose-500 font-bold hover:bg-rose-500 hover:text-white transition-all uppercase tracking-widest">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>

            <div class="mt-8 text-center text-[10px] text-cyan-900 uppercase tracking-widest">
                Verification Key: [ {{ Str::random(12) }} ]
            </div>
        </div>
    </div>
</x-layout>