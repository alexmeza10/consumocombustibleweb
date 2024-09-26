<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cambio de Contraseña</title>
  <style>
    html,
    body {
      font-family: "Arial", monospace !important;
      height: 100%;
      padding-top: 0;
      margin: 0;
      letter-spacing: 1px;
      line-height: 30px;
    }

    .container {
      height: auto;
      width: 100%;
      justify-content: center;
      align-items: center;
      display: flex;
      padding-top: 0;
      padding-bottom: 0;
    }

    .text {
      font-weight: bold;
      font-size: 28px;
      color: #303030;
      padding-bottom: 50px;
    }

    .dud {
      color: #000000;
    }

    .white-bg {
      width: 100%;
      background: #fff;
      padding-top: 100px;
    }

    .heart {
      display: block;
      width: 100%;
      text-align: center;
    }

    .swing {
      font-style: normal;
      font-size: 64px;
      color: #55ff33;
      display: block;
      width: 75px;
      height: 55px;
      margin: 20px auto;
    }

    .red-green {
      color: #55ff33 !important;
    }

    .red-redcheck {
      color: #f50 !important;
    }

    .message {
      display: block;
      margin: 0 auto 50px auto;
      border-radius: 15px;
      max-width: 320px;
      width: 90%;
      padding: 40px;
      text-align: left;
    }

    .message .info {
      font-style: normal;
      font-size: 18px;
      color: #757575;
      text-shadow: none;
    }

    .message span {
      padding: 0 25px;
      text-align: center;
      display: block;
      font-family: "Arial", monospace !important;
    }

    .message span strong {
      color: #ff7700;
    }

    .btn {
      display: block;
      width: 150px;
      height: 50px;
      margin: 20px auto;
      background-color: #ff7700;
      color: #fff;
      font-weight: bold;
      font-size: 18px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #ff9900;
    }

    @keyframes fadeInUp {
      0% {
        transform: translateY(100%);
        opacity: 0;
      }

      100% {
        transform: translateY(0%);
        opacity: 1;
      }
    }
  </style>
</head>

<body>
  <div class="white-bg">
    <div class="heart starterPosition enderPosition">
      <span class="swing">
        <em class="green-check">✓</em>
      </span>
    </div>

    <div class="container">
      <div class="text"></div>
    </div>

    <button class="btn" onclick="window.location.href = '{{ route('login') }}';">Inicio</button>
</div>

  <script>
    class TextScramble {
      constructor(el) {
        this.el = el;
        this.chars = '!<>-_\\/[]{}—=+*^?#________';
        this.update = this.update.bind(this);
      }
      setText(newText) {
        const oldText = this.el.innerText;
        const length = Math.max(oldText.length, newText.length);
        const promise = new Promise((resolve) => this.resolve = resolve);
        this.queue = [];
        for (let i = 0; i < length; i++) {
          const from = oldText[i] || '';
          const to = newText[i] || '';
          const start = Math.floor(Math.random() * 40);
          const end = start + Math.floor(Math.random() * 40);
          this.queue.push({ from, to, start, end });
        }
        cancelAnimationFrame(this.frameRequest);
        this.frame = 0;
        this.update();
        return promise;
      }
      update() {
        let output = '';
        let complete = 0;
        for (let i = 0, n = this.queue.length; i < n; i++) {
          let { from, to, start, end, char } = this.queue[i];
          if (this.frame >= end) {
            complete++;
            output += to;
          } else if (this.frame >= start) {
            if (!char || Math.random() < 0.28) {
              char = this.randomChar();
              this.queue[i].char = char;
            }
            output += `<span class="dud">${char}</span>`;
          } else {
            output += from;
          }
        }
        this.el.innerHTML = output;
        if (complete === this.queue.length) {
          this.resolve();
        } else {
          this.frameRequest = requestAnimationFrame(this.update);
          this.frame++;
        }
      }
      randomChar() {
        return this.chars[Math.floor(Math.random() * this.chars.length)];
      }
    }

    const phrases = [
      'Contraseña Actualizada!',
    ];

    const el = document.querySelector('.text');
    const fx = new TextScramble(el);

    let counter = 0;
    const next = () => {
      fx.setText(phrases[counter]).then(() => {
        setTimeout(next, 2000);
      });
      counter = (counter + 1) % phrases.length;
    };

    next();
  </script>
</body>

</html>
