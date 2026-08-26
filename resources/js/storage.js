// ==========================================
// STORAGE.JS
// Mengelola data Local Storage
// ==========================================

const USERS_KEY = "users";
const CURRENT_USER_KEY = "currentUser";

/**
 * Mengambil semua user
 */
export function getUsers() {
    const users = localStorage.getItem(USERS_KEY);
    return users ? JSON.parse(users) : [];
}

/**
 * Menyimpan semua user
 */
export function saveUsers(users) {
    localStorage.setItem(USERS_KEY, JSON.stringify(users));
}

/**
 * Menambahkan user baru
 */
export function addUser(user) {

    const users = getUsers();

    users.push(user);

    saveUsers(users);

}

/**
 * Mencari user berdasarkan email
 */
export function findUserByEmail(email) {

    const users = getUsers();

    return users.find(user => user.email === email);

}

/**
 * Menyimpan user yang sedang login
 */
export function setCurrentUser(user) {

    localStorage.setItem(
        CURRENT_USER_KEY,
        JSON.stringify(user)
    );

}

/**
 * Mengambil user yang sedang login
 */
export function getCurrentUser() {

    const user = localStorage.getItem(CURRENT_USER_KEY);

    return user ? JSON.parse(user) : null;

}

/**
 * Logout
 */
export function logout() {

    localStorage.removeItem(CURRENT_USER_KEY);

}