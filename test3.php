<style>
	@keyframes slideDown {
  from {
    transform: translateY(-100%);
  }
  to {
    transform: translateY(0%);
  }
}

.menu {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #000;
  transform: translateY(-100%);
  animation: slideDown 0.5s ease-in-out;
}

</style>
<div class="menu">
  <ul>
    <li><a href="#">Inicio</a></li>
    <li><a href="#">Acerca de</a></li>
    <li><a href="#">Servicios</a></li>
    <li><a href="#">Contacto</a></li>
  </ul>
</div>
