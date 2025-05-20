<?php
$status = $_GET['status'] ?? 'erro';

$success = $status === 'sucesso';
$title = $success ? "Feedback Enviado!" : "Algo deu errado";
$message = $success
    ? "Seu feedback foi registrado com sucesso. Obrigado por contribuir!"
    : "Não conseguimos registrar seu feedback. Tente novamente mais tarde.";
$icon = $success ? "bx-check-circle" : "bx-x-circle";
$color = $success ? "text-green-600" : "text-red-600";
$bg = $success ? "bg-black" : "bg-black";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Status do Feedback</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen <?= $bg ?>">

  <div class="bg-white shadow-lg rounded-2xl p-8 max-w-md text-center animate-fade-in-down">
    <div class="text-5xl <?= $color ?>">
      <i class='bx <?= $icon ?>'></i>
    </div>
    <h2 class="text-xl font-bold mt-4"><?= $title ?></h2>
    <p class="text-gray-600 mt-2"><?= $message ?></p>

    <a href="index.html" class="mt-6 inline-block px-6 py-2 rounded-xl text-white bg-green-500 hover:bg-green-700 transition">
      <i class='bx bx-chevron-left'></i>
    Voltar
    </a>
  </div>

  <style>
    @keyframes fade-in-down {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .animate-fade-in-down {
      animation: fade-in-down 0.4s ease-out both;
    }
  </style>
</body>
</html>
