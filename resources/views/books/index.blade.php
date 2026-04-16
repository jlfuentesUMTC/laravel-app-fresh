<x-layout title="Books">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        .font-nexus { font-family: 'Orbitron', sans-serif; }
        .nexus-gradient { background: radial-gradient(circle at 50% 50%, #1e293b 0%, #0a0c12 100%); }
    </style>

    <div class="nexus-gradient font-nexus min-h-screen p-10 text-slate-300">
        <div class="max-w-7xl mx-auto">
            
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h1 class="text-4xl font-bold text-cyan-400 tracking-widest drop-shadow-[0_0_10px_rgba(34,211,238,0.5)]">
                        BOOK_DATABASE
                    </h1>
                    <p class="text-xs text-cyan-500/60 mt-1 uppercase tracking-tighter">System_Status: Operational</p>
                </div>
                <a href="/books/create" 
                   class="bg-cyan-500 hover:bg-cyan-400 text-black px-6 py-2 rounded-lg font-bold transition-all hover:shadow-[0_0_20px_rgba(34,211,238,0.6)] uppercase text-sm">
                    + Add_Record
                </a>
            </div>

            <div class="bg-slate-900/80 border border-cyan-500/20 rounded-2xl shadow-2xl overflow-hidden backdrop-blur-xl">
                
                <div class="p-6 border-b border-cyan-500/10 flex gap-4">
                    <input type="text" id="search" value="{{ request('search') }}"
                        placeholder="SEARCH_BY_TITLE_OR_AUTHOR..."
                        class="bg-black/50 border border-cyan-500/30 rounded-lg px-4 py-2 text-cyan-400 placeholder:text-cyan-900 focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400 w-80 transition-all">

                    <select id="genre" 
                        class="bg-black/50 border border-cyan-500/30 rounded-lg px-4 py-2 text-cyan-400 focus:outline-none focus:border-cyan-400 transition-all cursor-pointer">
                        <option value="" class="bg-slate-900">ALL_GENRES</option>
                        <option value="Fiction" class="bg-slate-900" {{ request('genre') == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                        <option value="Sci-Fi" class="bg-slate-900" {{ request('genre') == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                        <option value="Non-Fiction" class="bg-slate-900" {{ request('genre') == 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
                        <option value="Fantasy" class="bg-slate-900" {{ request('genre') == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                    </select>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-cyan-500/5">
                                <th class="p-4 text-cyan-400 text-xs uppercase tracking-widest border-b border-cyan-500/20">Title</th>
                                <th class="p-4 text-cyan-400 text-xs uppercase tracking-widest border-b border-cyan-500/20">Author</th>
                                <th class="p-4 text-cyan-400 text-xs uppercase tracking-widest border-b border-cyan-500/20">Genre</th>
                                <th class="p-4 text-cyan-400 text-xs uppercase tracking-widest border-b border-cyan-500/20">Price</th>
                                <th class="p-4 text-cyan-400 text-xs uppercase tracking-widest border-b border-cyan-500/20">Availability</th>
                                <th class="p-4 text-cyan-400 text-xs uppercase tracking-widest border-b border-cyan-500/20 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="books-table-body" class="divide-y divide-cyan-500/5">
                            @foreach($books as $book)
                            <tr class="hover:bg-cyan-500/5 transition-colors group">
                                <td class="p-4 text-white font-medium group-hover:text-cyan-300 transition-colors">{{ $book->title }}</td>
                                <td class="p-4 opacity-80">{{ $book->author }}</td>
                                <td class="p-4">
                                    <span class="text-[10px] px-2 py-1 border border-cyan-500/30 rounded bg-cyan-500/10">{{ $book->genre }}</span>
                                </td>
                                <td class="p-4 text-cyan-400 font-bold">₱{{ number_format($book->price, 2) }}</td>
                                <td class="p-4">
                                    <span class="text-xs {{ $book->is_available ? 'text-emerald-400' : 'text-rose-500' }}">
                                        {{ $book->is_available ? '● ONLINE' : '○ OFFLINE' }}
                                    </span>
                                </td>
                                <td class="p-4 flex justify-center gap-2">
                                    <a href="/books/{{ $book->id }}" 
                                       class="px-3 py-1 rounded border border-blue-500/50 text-blue-400 text-[10px] hover:bg-blue-500 hover:text-white transition-all">VIEW</a>
                                    <a href="/books/{{ $book->id }}/edit" 
                                       class="px-3 py-1 rounded border border-yellow-500/50 text-yellow-500 text-[10px] hover:bg-yellow-500 hover:text-black transition-all">EDIT</a>
                                    <form method="POST" action="/books/{{ $book->id }}" onsubmit="return confirm('Confirm Deletion?')">
                                        @csrf @method('DELETE')
                                        <button class="px-3 py-1 rounded border border-rose-500/50 text-rose-500 text-[10px] hover:bg-rose-500 hover:text-white transition-all">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById('search');
        const genreSelect = document.getElementById('genre');
        const tableBody  = document.getElementById('books-table-body');
        let debounceTimer;

        // Function to rebuild the table rows for AJAX response
        function fetchBooks() {
            const search = searchInput.value;
            const genre  = genreSelect.value;

            fetch(`/books?search=${encodeURIComponent(search)}&genre=${encodeURIComponent(genre)}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(books => {
                if (books.length === 0) {
                    tableBody.innerHTML = `
                        <tr>
                            <td colspan="6" class="p-10 text-center text-cyan-500/40 uppercase tracking-widest text-sm">
                                [ NO_RECORDS_MATCH_QUERY ]
                            </td>
                        </tr>`;
                    return;
                }

                tableBody.innerHTML = books.map(book => `
                    <tr class="hover:bg-cyan-500/5 transition-colors group border-b border-cyan-500/5">
                        <td class="p-4 text-white font-medium group-hover:text-cyan-300 transition-colors">${book.title}</td>
                        <td class="p-4 opacity-80">${book.author}</td>
                        <td class="p-4">
                            <span class="text-[10px] px-2 py-1 border border-cyan-500/30 rounded bg-cyan-500/10">${book.genre}</span>
                        </td>
                        <td class="p-4 text-cyan-400 font-bold">₱${book.price}</td>
                        <td class="p-4">
                            <span class="text-xs ${book.is_available ? 'text-emerald-400' : 'text-rose-500'}">
                                ${book.is_available ? '● ONLINE' : '○ OFFLINE'}
                            </span>
                        </td>
                        <td class="p-4 flex justify-center gap-2">
                            <a href="/books/${book.id}" class="px-3 py-1 rounded border border-blue-500/50 text-blue-400 text-[10px] hover:bg-blue-500 hover:text-white transition-all">VIEW</a>
                            <a href="/books/${book.id}/edit" class="px-3 py-1 rounded border border-yellow-500/50 text-yellow-500 text-[10px] hover:bg-yellow-500 hover:text-black transition-all">EDIT</a>
                            <form method="POST" action="/books/${book.id}">
                                @csrf @method('DELETE')
                                <button class="px-3 py-1 rounded border border-rose-500/50 text-rose-500 text-[10px] hover:bg-rose-500 hover:text-white transition-all">DELETE</button>
                            </form>
                        </td>
                    </tr>
                `).join('');
            });
        }

        searchInput.addEventListener('input', () => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(fetchBooks, 300);
        });

        genreSelect.addEventListener('change', fetchBooks);
    </script>
</x-layout>