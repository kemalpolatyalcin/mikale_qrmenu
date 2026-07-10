<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mikale | Yönetici Girişi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Allison&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        .font-allison {
            font-family: 'Allison', cursive;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-[#F9F8F3] h-screen flex items-center justify-center font-poppins">

    <div class="bg-white p-10 rounded-3xl shadow-xl w-full max-w-md border border-gray-100">
        <div class="text-center mb-8">
            <div class="font-allison text-[6rem] text-[#1C1C1C] leading-none mb-2">M</div>
            <h1 class="text-xl font-semibold text-gray-800 tracking-wide uppercase">Yönetim Paneli</h1>
            <p class="text-sm text-gray-500 mt-1">Lütfen yönetici bilgilerinizi girin</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 text-red-600 p-3 rounded-xl text-sm mb-6 text-center border border-red-100">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">E-posta Adresi</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8C6C47] focus:border-[#8C6C47] outline-none transition-all text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Şifre</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8C6C47] focus:border-[#8C6C47] outline-none transition-all text-sm">
            </div>

            <button type="submit"
                class="w-full bg-[#1C1C1C] text-white font-medium py-3.5 rounded-xl hover:bg-[#8C6C47] transition-colors mt-4 shadow-md">
                Giriş Yap
            </button>
        </form>
    </div>

</body>

</html>