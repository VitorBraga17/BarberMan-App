import axios from 'axios';

export const axiosHttp = axios.create({
  baseURL: 'http://localhost/appbarber.php'
});