import http from 'k6/http';

export const options = {
  stages: [
    { target: 10, duration: '5m' },
  ],
};

export default function () {
  http.get('http://host.docker.internal:8080/Sample');
};