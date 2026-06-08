import { Controller, Get } from '@nestjs/common';

@Controller('health')
export class HealthController {
  @Get()
  healthCheck() {
    return { status: 'ok', message: 'Server is running', timestamp: new Date() };
  }
}