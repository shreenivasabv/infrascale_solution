FROM php:8.2-fpm as backend

# Install Node.js (for Vite build)
RUN apt-get update && \
	apt-get install -y curl gnupg && \
	curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
	apt-get install -y nodejs && \
	apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY . .

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Build Vite frontend
RUN cd /app && npm install && npm run build

# Install static server for frontend
RUN npm install -g serve

# Install supervisord to run both services
RUN apt-get update && apt-get install -y supervisor && \
	apt-get clean && rm -rf /var/lib/apt/lists/*

# Create supervisord config
RUN echo "[supervisord]\nnodaemon=true\n\n[program:php-fpm]\ncommand=php-fpm\n\n[program:frontend]\ncommand=serve -s /app/public/build -l 3000\n" > /etc/supervisor/conf.d/supervisord.conf

EXPOSE 9000 3000

CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]