
const nav = document.getElementById('nav');
const toggle = document.querySelector('.nav-toggle');
if (toggle) toggle.onclick = () => nav.classList.toggle('open');

const play = document.querySelector('.video__play');
if (play) {
  const vid = document.querySelector('.video video');
  play.onclick = () => {
    vid.play();
    vid.controls = true;
    play.style.display = 'none';
  };
}
const form = document.getElementById('contact-form');
if (form) {
  form.onsubmit = (e) => {
    e.preventDefault();
    form.querySelectorAll('[data-required]').forEach((f) =>
      f.classList.toggle('has-error', !f.querySelector('input').value.trim()));
    const ok = !form.querySelector('.has-error');
    document.getElementById('form-ok').classList.toggle('show', ok);
    if (ok) form.reset();
    else form.querySelector('.has-error input').focus();
  };

  form.oninput = (e) => e.target.closest('.field').classList.remove('has-error');
}