# Boletim da Captação

Aplicação web do **Boletim da Captação**, newsletter semanal para profissionais de captação de recursos.

## Stack da fundação

| Componente | Versão fixada |
| --- | --- |
| Laravel | 13.x (`^13.17`) |
| PHP | 8.5.10 |
| Composer | 2.10.3 |
| Node.js | 24.20.0 LTS |

As versões de PHP e Node também estão registradas em `.php-version`, `.node-version`, `.nvmrc` e `.tool-versions`.

## Requisitos

- PHP 8.5.x
- Composer 2.10.x
- Node.js 24.x LTS (necessário a partir da integração do frontend/assets)

## Instalação local

```bash
git clone https://github.com/freitaseric/boletim-da-captacao.git
cd boletim-da-captacao
composer install
cp .env.example .env
php artisan key:generate
```

No Windows PowerShell, substitua `cp` por:

```powershell
Copy-Item .env.example .env
```

## Executar

```bash
php artisan serve
```

A aplicação ficará disponível, por padrão, em `http://127.0.0.1:8000`.

O endpoint de health padrão do Laravel fica em `http://127.0.0.1:8000/up`.

## Testes

```bash
composer test
```

## Configuração

`.env.example` contém apenas valores locais e não sensíveis. Credenciais reais, tokens e chaves nunca devem ser versionados.

O ambiente Docker/PostgreSQL/Redis será materializado na **BDC-3**; a estrutura modular do monólito pertence à **BDC-2**.
