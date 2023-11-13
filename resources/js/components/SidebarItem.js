Alpine.data('sidebarItem', () => ({
    isOpen: false, // Estado para controlar si el elemento desplegable está abierto

    // Método para cambiar el estado de isOpen
    toggleDropdown() {
        this.isOpen = !this.isOpen;
    },
}));