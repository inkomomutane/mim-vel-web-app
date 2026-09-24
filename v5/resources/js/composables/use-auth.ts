import { shallowRef } from 'vue'

export function useAuth() {




  const loading = shallowRef(false)

  function logout() {

  }

  function toHome() {

  }

  async function login() {

  }

  return {
    loading,
    logout,
    login,
  }
}
